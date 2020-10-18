<?php

use Illuminate\Support\Facades\Auth;
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

Route::redirect('/', '/login');

Auth::routes();

Route::get('/auth/getUser', 'AuthController@getUser');
Route::get('/auth/logout', 'AuthController@logout');

Route::middleware('auth')->group(function() {
    Route::get('/feed', 'FeedController@index');
    Route::post('/feed/get', 'FeedController@feedPosts');

    Route::get('/me', 'FeedController@me');
    Route::post('/me/get', 'FeedController@mePosts');

    Route::get('/post/create', 'PostController@create');
    Route::post('/post/create', 'PostController@createPost');

    Route::get('/post/get/{id}', 'PostController@getPost');

    Route::get('/post/{id}', 'PostController@index');
});
