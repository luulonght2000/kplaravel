<?php

use App\Http\Controllers\LoginController;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//Trang chủ mặc định 
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/404', function () {
    abort(404);
});

Route::get('/readData', [App\Http\Controllers\UserController::class, 'readData']);


//Đăng ký thành viên 
Route::get('register', [\App\Http\Controllers\RegisterController::class, 'getRegister'])->name('register');
Route::post('register', [\App\Http\Controllers\RegisterController::class, 'postRegister']);

//Đăng nhập và xử lý đăng nhập
Route::get('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('auth.login');
Route::post('login', [\App\Http\Controllers\LoginController::class, 'checkLogin'])->name('checkLogin');

//Logout
Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout']);


//Trang admin
Route::prefix('/')->middleware('admin.login')->group(function () {
    Route::resource('/post', \App\Http\Controllers\PostController::class);
    Route::get('/post', [\App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    Route::get('/post/postDetail/{id}', '\App\Http\Controllers\PostController@postDetail');
});

Route::prefix('/')->group(function () {
    Route::resource('comment', \App\Http\Controllers\CommentController::class);
});

Route::prefix('/')->group(function () {
    Route::resource('user', \App\Http\Controllers\UserController::class);
});

//---------------------------Login google-----------------------------
Route::controller(App\Http\Controllers\SocialController::class)->group(function () {
    Route::get('google', 'redirectToGoogle')->name('auth.google');
    Route::get('google/callback', 'handleGoogleCallback');
    Route::get('google/logout', 'logout');
});


//--------------------------Login Facebook--------------------------------
Route::controller(App\Http\Controllers\SocialController::class)->group(function () {
    Route::get('facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('facebook/callback', 'handleFacebookCallback');
});
