<?php

namespace App\Http\Controllers\Category;

use App\Status;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Policies\CategoryPolicy;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\UpdateRequest;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Category::class, 'category', ['except' => ['index', 'show']]);
    }

    public function index(Request $request)
    {
        $category = Category::query()->latest();

        if($request->has('search'))
        {
            $category->where(['name', 'like', '%' . $request->search . '%']);
        }

        $category = $category->get();

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $category,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $category = new Category;

        $category->fill($request->all());
        $category->slug = Str::slug($request->name, '-');

        $category->save();

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $category,
        ]);
    }

    public function show(Category $category)
    {
        $category = $category->posts;

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $category,
        ]);
    }

   
    public function update(UpdateRequest $request, Category $category)
    {
        $category->fill($request->all());
        $category->slug = Str::slug($request->name, '-');

        $category->save();

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $category,
        ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        
        return response()->json([
            'status' => Status::SUCCESS,
        ]);
    }

    public function restore($id)
    {
        $this->authorize('restore', Category::class);

        $category = Category::onlyTrashed()
            ->where('id', $id)
            ->restore();
        
        if($category)
        {
            return response()->json([
                'status' => Status::SUCCESS,
            ]);
        }

        return response()->json([
            'status' => Status::FAILURE,
        ]);
    }

    public function forceDelete($id)
    {
        $this->authorize('forceDelete', Category::class);

        $category = Category::onlyTrashed()
            ->where('id', $id)
            ->forceDelete();
        
        if($category)
        {
            return response()->json([
                'status' => Status::SUCCESS,
            ]);
        }

        return response()->json([
            'status' => Status::FAILURE,
        ]);
    }

    public function trash()
    {
        $trash = Category::onlyTrashed()->get();

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $trash,
        ]);
    }
}
