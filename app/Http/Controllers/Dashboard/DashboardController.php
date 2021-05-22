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
                $category = Category::onlyTrashed()
                    ->where('id', $id)
                    ->restore();

                if($category)
                    return response()->json([
                        'status' => Status::SUCCESS,
                    ]);
            }
            else if($request->type == 'post')
            {
                $post = Post::onlyTrashed()
                    ->where('id', $id)
                    ->restore();

                if($post)
                    return response()->json([
                        'status' => Status::SUCCESS,
                    ]);
            }
        }

        return response()->json([
            'status' => Status::FAILURE,
        ]);
    }

    public function forceDelete(Request $request, $id)
    {
        if(Gate::allows('isAdmin'))
        {
            if($request->type == 'category')
            {
                $category = Category::onlyTrashed()
                    ->where('id', $id)
                    ->forceDelete();
                
                if($category)
                    return response()->json([
                        'status' => Status::SUCCESS,
                    ]);
            }
            else if($request->type == 'post')
            {
                $post = Post::onlyTrashed()
                    ->where('id', $id)
                    ->forceDelete();

                if($post)
                    return response()->json([
                        'status' => Status::SUCCESS,
                    ]);
            }

            return response()->json([
                'status' => Status::FAILURE,
            ]);
        }
    }

}
