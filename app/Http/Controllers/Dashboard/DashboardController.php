<?php

namespace App\Http\Controllers\Dashboard;

use App\Status;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DashboardController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', Auth::user());

        $category = Category::onlyTrashed()->get();
        $post = Post::onlyTrashed()->get();
        $user = User::onlyTrashed()->get();
        
        return response()->json([
            'status' => Status::SUCCESS,
            'data' => [
                'category' => $category,
                'post' => $post,
                'user' => $user,
            ]
        ]);

        return response()->json([
            'status' => Status::FAILURE,
        ]);
    }

    public function restore(Request $request, $id)
    {
        $this->authorize('viewAny', Auth::user());
        
        if($request->type == 'category')
            $type = Category::onlyTrashed()->where('id', $id);
        else if($request->type == 'post')
            $type = Post::onlyTrashed()->where('id', $id);
        else if($request->type == 'user')
            $type = User::onlyTrashed()->where('id', $id);

        $action = $type->restore();

        if($action)
            return response()->json([
                'status' => Status::SUCCESS,
                'message' => 'Restore success.',
            ]);
            
        return response()->json([
            'status' => Status::FAILURE,
            'message' => 'Restore failure.',
        ]);
    }

    public function forceDelete(Request $request, $id)
    {
        $this->authorize('viewAny', Auth::user());

        if($request->type == 'category')
            $type = Category::onlyTrashed()->where('id', $id);
        else if($request->type == 'post')
            $type = Post::onlyTrashed()->where('id', $id);
        

        $action = $type->forceDelete();

        if($action)
            return response()->json([
                'status' => Status::SUCCESS,
                'message' => 'Delete success.',
            ]);
            
        return response()->json([
            'status' => Status::FAILURE,
            'message' => 'Delete failure.',
        ]);
    }
    
}
