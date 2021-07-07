<?php

namespace App\Http\Controllers\Comment;

use App\Status;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Comment\ReplyRequest;
use App\Http\Requests\Comment\UpdateRequest;
use App\Http\Requests\Comment\CreateRequest;

class CommentController extends Controller
{
   
    public function store(CreateRequest $request)
    {
        $comment = new Comment;

        $user = Auth::user();

        $post = Post::findOrFail($request->post);

        $comment->user_id = $user->id;
        $comment->post_id = $post->id;
        $comment->comment = $request->comment;

        $comment->save();

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $comment,
        ]);
    }

    public function reply(ReplyRequest $request, Comment $comment)
    {
        $reply = new Comment;
        
        $reply->user_id = $comment->user_id;
        $reply->post_id = $comment->post_id;
        $reply->reply_id = $comment->id;
        $reply->comment = $request->comment;

        $reply->save();

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $reply,
        ]);
    }

    public function update(UpdateRequest $request, Comment $comment)
    {
        $comment->comment = $request->comment;

        $comment->save();

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $comment,
        ]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        
        return response()->json([
            'status' => Status::SUCCESS,
            'message' => 'Delete comment success.',
        ]);
    }
}
