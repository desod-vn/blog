<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Category\CategoryController;


Route::group([], function() {

    /**********
    *****
    ***CHUYÊN MỤC
    *****
    **********/

        // Tất cả chuyên mục
        Route::get('/category', [CategoryController::class, 'index']);

        // Một chuyên mục
        Route::get('/category/{category}', [CategoryController::class, 'show']);

    
});

Route::group(['middleware' => 'guest'], function() {

    // Đăng ký
    Route::post('/register', [RegisterController::class, 'index'])
        ->name('register');

    // Đăng nhập
    Route::post('/login', [LoginController::class, 'index'])
        ->name('login');


});


Route::group(['middleware' => 'auth:api'], function() {

    // Đăng xuất
    Route::post('/logout', [LogoutController::class, 'index'])
        ->name('logout');

    /**********
    *****
    ***CHUYÊN MỤC
    *****
    **********/

        // Thêm, sửa, ẩn
        Route::resource('/category', CategoryController::class)
            ->except(['index', 'show', 'create', 'edit']);

        // Khôi phục
        Route::post('/category/restore/{id}', [CategoryController::class, 'restore'])
            ->name('category.restore');

        // Xóa vĩnh viễn
        Route::delete('/category/delete/{id}', [CategoryController::class, 'forceDelete'])
            ->name('category.delete');

        // Thùng rác
        Route::get('/trash/category/', [CategoryController::class, 'trash'])
            ->name('category.trash');
});
