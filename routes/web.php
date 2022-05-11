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
    return view('fontend/home');
});

Route::get('user/{id}/name/{name?}', function ($id, $name = "null") {
    return "User: $id, Tên: $name";
});
// ->where(['id' => '[0-9]+', 'name' => '[a-z]+']);


Route::get('/responses', function ($minutes = 4) {
    return response('Hello World')->cookie('name', 'value', $minutes);
});

Route::prefix('/')->group(function () {
    Route::resource('home', \App\Http\Controllers\HomeController::class);
});

Route::prefix('/post')->group(function () {
    Route::resource('/', \App\Http\Controllers\PostController::class);
    Route::get('/postDetail/{id}', '\App\Http\Controllers\PostController@postDetail');
});

Route::prefix('/')->group(function () {
    Route::resource('comment', \App\Http\Controllers\CommentController::class);
});

Route::prefix('/')->group(function () {
    Route::resource('user', \App\Http\Controllers\UserController::class);
});
