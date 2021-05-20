<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware', 'guest'], function() {

    // Đăng ký
    Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@index')
        ->name('register');

    // Đăng nhập
    Route::post('/login', 'App\Http\Controllers\Auth\LoginController@index')
        ->name('login');

});
