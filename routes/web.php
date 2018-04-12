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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/post', 'HomeController@index')->name('post');

Route::get('/', function () {
    return view('welcome');
})->name('post');


Route::get('/post', 'PostController@home');
Route::get('/like', 'PostController@likePost')->name('like');
