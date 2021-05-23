<?php

namespace App\Http\Controllers\Dashboard;

use App\Status;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DashboardController extends Controller
{

    public function index()
    {

        if(Gate::allows('isAdmin'))
        {
            $category = Category::onlyTrashed()->get();
            $post = Post::onlyTrashed()->get();
            
            return response()->json([
                'status' => Status::SUCCESS,
                'data' => [
                    'category' => $category,
                    'post' => $post,
                ]
            ]);
        }

        return response()->json([
            'status' => Status::FAILURE,
        ]);
    }

    public function restore(Request $request, $id)
    {
        if(Gate::allows('isAdmin'))
        {
            if($request->type == 'category')
            {
                $type = Category::onlyTrashed()
                    ->where('id', $id);
            }
            else if($request->type == 'post')
            {
                $type = Post::onlyTrashed()
                ->where('id', $id);
            }
            $action = $type->restore();

            if($action)
            {
                return response()->json([
                    'status' => Status::SUCCESS,
                    'message' => 'Restore success.',
                ]);
            }
        }
            
        return response()->json([
            'status' => Status::FAILURE,
            'message' => 'Restore failure.',
        ]);
    }

    public function forceDelete(Request $request, $id)
    {
        if(Gate::allows('isAdmin'))
        {
            if($request->type == 'category')
            {
                $type = Category::onlyTrashed()
                    ->where('id', $id);
            }
            else if($request->type == 'post')
            {
                $type = Post::onlyTrashed()
                ->where('id', $id);
            }
            $action = $type->forceDelete();

            if($action)
            {
                return response()->json([
                    'status' => Status::SUCCESS,
                    'message' => 'Delete success.',
                ]);
            }
        }
            
        return response()->json([
            'status' => Status::FAILURE,
            'message' => 'Delete failure.',
        ]);
    }
    
}
