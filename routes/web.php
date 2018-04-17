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
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/gestion', 'PostController@gestion')->middleware('auth')->name('gestion');


// IDEA BOX
Route::get('/idea', 'PostController@idea')->name('idea');

// EVENT
Route::get('/event', 'EventController@event')->name('event');

// LIKE / DISLIKE SYSTEM
Route::post('/like', ['uses' => 'PostController@LikePost', 'as' => 'like']);
Route::post('/create_post', ['uses' => 'PostController@CreatePost', 'as' => 'post.create', 'middleware' => 'auth']);
Route::get('/delete-post/{post_id}', ['uses' => 'PostController@DeletePost', 'as' => 'post.delete', 'middleware' => 'auth']);
Route::post('/edit', ['uses' => 'PostController@EditPost', 'as' => 'edit', 'middleware' => 'auth']);

// EVENT SYSTEM
Route::post('/subscribe', ['uses' => 'EventController@LikeEvent', 'as' => 'subscribe']);
Route::post('/create_event/', ['uses' => 'EventController@CreateEvent', 'as' => 'event.create', 'middleware' => 'auth']);
Route::get('/delete_event/{post_id}', ['uses' => 'EventController@DeleteEvent', 'as' => 'event.delete', 'middleware' => 'auth']);
Route::post('/edit_event', ['uses' => 'EventController@EditEvent', 'as' => 'edit_event', 'middleware' => 'auth']);

// IMAGE EVENT
Route::get('/eventimage/{filename}', ['uses' => 'EventController@getEventImage', 'as' => 'event.image']);

// SHOP
Route::get('/shop', 'ShopController@shop')->name('shop');