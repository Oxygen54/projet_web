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

// CONTACT
// HOME
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// IDEA BOX
Route::get('/idea', 'PostController@idea')->name('idea');

// EVENT
Route::get('/event', 'EventController@event')->name('event');

// GESTION
Route::get('/gestion', 'HomeController@gestion')->name('gestion');

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

// CONTACT SEND
Route::post('/send', 'ContactController@send')->name('send');

// SHOP
Route::get('/shop', ['uses' => 'ProductController@getIndex', 'as' => 'shop.index']);
Route::get('/shop/search', 'ProductController@search');
Route::get('/shop/add-to-cart{id}', ['uses' => 'ProductController@getAddToCart', 'as' => 'shop.addToCart']);
Route::get('/shop/reduce/{id}', ['uses' => 'ProductController@getReduceByOne', 'as' => 'shop.reduceByOne']);
Route::get('/shop/remove/{id}', ['uses' => 'ProductController@getRemoveItem', 'as' => 'shop.remove']);
Route::get('/shop/shopping-cart', ['uses' => 'ProductController@getCart', 'as' => 'shop.shoppingCart']);
Route::get('/shop/checkout', ['uses' => 'ProductController@getCheckout', 'as' => 'checkout']);
Route::get('/shop/category', ['uses' => 'CategoryController@getCategories', 'as' => 'shop.category']);
Route::get('/shop/category{id}', ['uses' => 'CategoryController@getProductCategory', 'as' => 'shop.category-product']);
Route::get('/shop/shopping-cart', ['uses' => 'ProductController@getCart', 'as' => 'shop.shoppingCart']);
Route::post('/shop/checkout', ['uses' => 'ProductController@postCheckout', 'as' => 'checkout']);

Route::get('/shop', 'ProductController@getIndex')->name('shop');