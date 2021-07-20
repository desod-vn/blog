<?php

namespace App\Http\Controllers\Post;

use App\Status;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\Post\CreateRequest;
use App\Http\Requests\Post\UpdateRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post', ['except' => ['index', 'show']]);
    }

    public function index(Request $request)
    {
        $post = Post::query();
        

        if($request->sort == 'oldest')
            $post->oldest();
        else if($request->sort == 'hottest')
            $post->orderBy('view', 'desc');
        else
            $post->latest();


        if($request->has('search'))
            $post->where(['name', 'like', '%' . $request->search . '%'])
                ->orWhere(['description', 'like', '%' . $request->search . '%']);

        $post = $post->select('name', 'id', 'slug', 'image', 'description')
                     ->paginate(Status::POST_PER_PAGE);


        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $post,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $image = $request->file('image')->store(Status::POST_IMAGE);

        $post = new Post;
        
        $post->fill($request->all());
        $post->image = Status::APP . $image;     
        $post->slug = Str::slug($request->name, '-');
        $post->user_id = Auth::user()->id;

        $post->save();
        $post->categories()->attach($request->categories);

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $post,
        ]);

    }

    public function show(Post $post)
    {
        $post->update(['view', $post->view++]);
        $post->user;
        $post->categories;

        foreach($post->comments as $comment)
        {
            $comment->user;
            foreach($comment->replies as $reply)
                $reply->user;
        }


        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $post,
        ]);
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $oldImage = substr($post->image, strlen(Status::APP));
        
        $post->fill($request->all());
        $post->slug = Str::slug($request->name, '-');

        if($request->has('image'))
        {
            $image = $request->file('image')->store(Status::POST_IMAGE);
            Storage::delete($oldImage);
            $post->image = Status::APP . $image;   
        }
        
        $post->save();
        $post->categories()->sync($request->categories);

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $post,
        ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        $post->categories()->detach();

        return response()->json([
            'status' => Status::SUCCESS,
            'message' => 'Moved to trash.',
        ]);
    }
}
