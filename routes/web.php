<?php

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/welcome', function () {
    return view('fontend.test')->name('welcome');
    //->with(['name' => 'Taylor']);
});

Route::get('user/{id}/name/{name?}', function ($id, $name = "null") {
    return "User: $id, Tên: $name";
});
// ->where(['id' => '[0-9]+', 'name' => '[a-z]+']);



Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return "lưu long";
    });
});

Route::get('/responses', function ($minutes = 4) {
    return response('Hello World')->cookie('name', 'value', $minutes);
});

Route::prefix('/')->group(function () {
    Route::resource('home', \App\Http\Controllers\HomeController::class);
});

Route::prefix('/')->group(function () {
    Route::resource('post', \App\Http\Controllers\PostController::class);
});

Route::prefix('/')->group(function () {
    Route::resource('comment', \App\Http\Controllers\CommentController::class);
});

Route::prefix('/')->group(function () {
    Route::resource('user', \App\Http\Controllers\UserController::class);
});
