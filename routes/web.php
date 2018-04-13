<?php

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


// HOME
Route::get('/', function () {return view('welcome');})->name('home');
Route::get('/home', 'PostController@home')->middleware('auth');


// IDEA BOX
Route::get('/idea', 'PostController@idea')->middleware('auth');


// LIKE / DISLIKE SYSTEM
Route::post('/like', ['uses' => 'PostController@LikePost', 'as' => 'like']);
Route::post('/createpost', ['uses' => 'PostController@CreatePost', 'as' => 'post.create', 'middleware' => 'auth']);