<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Comment\CommentController;



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
    
    /**********
    *****
    ***BÀI VIẾT
    *****
    **********/

        // Tất cả bài viết
        Route::get('/post', [PostController::class, 'index']);

        // Một bài viết
        Route::get('/post/{post}', [PostController::class, 'show']);

    
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
    ***THÙNG RÁC
    *****
    **********/

        // Xem
        Route::get('/trash', [DashboardController::class, 'index'])
            ->name('trash.view');

        // Khôi phục
        Route::post('/trash/restore/{id}', [DashboardController::class, 'restore'])
            ->name('trash.restore');

        // Xóa vĩnh viễn
        Route::delete('/trash/delete/{id}', [DashboardController::class, 'forceDelete'])
            ->name('trash.delete');

    /**********
    *****
    ***CHUYÊN MỤC
    *****
    **********/

        // Thêm, sửa, xóa
        Route::resource('/category', CategoryController::class)
            ->except(['index', 'show', 'create', 'edit']);

    /**********
    *****
    ***BÀI VIẾT
    *****
    **********/

        // Thêm, xóa
        Route::resource('/post', PostController::class)
            ->except(['index', 'show', 'update', 'create', 'edit']);
        
        // Sửa
        Route::post('/post/{post}', [PostController::class, 'update'])
            ->name('post.update');        

    /**********
    *****
    ***NGƯỜI DÙNG
    *****
    **********/

        // Thêm, sửa, xóa
        Route::resource('/user', UserController::class)
            ->except(['create', 'edit', 'store']);
        // Ảnh đại diện
        Route::post('/user/avatar/{user}', [UserController::class, 'avatar'])
            ->name('user.avatar');
        // Đổi mật khẩu
        Route::post('user/password/{user}', [UserController::class, 'password'])
            ->name('user.password');

    /**********
    *****
    ***BÌNH LUẬN
    *****
    **********/

        // Thêm, sửa, xóa
        Route::resource('/comment', CommentController::class)
            ->except(['index', 'show', 'create', 'edit']);
        // Ảnh đại diện
        Route::post('/comment/reply/{comment}', [CommentController::class, 'reply'])
            ->name('comment.reply');
        
});
