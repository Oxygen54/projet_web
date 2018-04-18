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
Route::get('/management', 'PostController@management')->middleware('auth')->name('management');

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
Route::get('/management', 'UserController@management')->name('management');
Route::get('/delete-user/{user_id}', ['uses' => 'UserController@DeleteUser', 'as' => 'user.delete', 'middleware' => 'auth']);
Route::post('/edit_user', ['uses' => 'UserController@EditUser', 'as' => 'edit_user', 'middleware' => 'auth']);

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
Route::get('/shop', ['uses' => 'ProductController@getIndex', 'as' => 'shop.index', 'middleware' => 'auth']);
Route::get('/shop/search', 'ProductController@search');
Route::get('/shop/add-to-cart{id}', ['uses' => 'ProductController@getAddToCart', 'as' => 'shop.addToCart', 'middleware' => 'auth']);
Route::get('/shop/reduce/{id}', ['uses' => 'ProductController@getReduceByOne', 'as' => 'shop.reduceByOne', 'middleware' => 'auth']);
Route::get('/shop/remove/{id}', ['uses' => 'ProductController@getRemoveItem', 'as' => 'shop.remove', 'middleware' => 'auth']);
Route::get('/shop/shopping-cart', ['uses' => 'ProductController@getCart', 'as' => 'shop.shoppingCart', 'middleware' => 'auth']);
Route::get('/shop/checkout', ['uses' => 'ProductController@getCheckout', 'as' => 'checkout', 'middleware' => 'auth']);
Route::get('/shop/category', ['uses' => 'CategoryController@getCategories', 'as' => 'shop.category', 'middleware' => 'auth']);
Route::get('/shop/category{id}', ['uses' => 'CategoryController@getProductCategory', 'as' => 'shop.category-product', 'middleware' => 'auth']);
Route::get('/shop/add-product', ['uses' => 'AddProductController@formulaire', 'as' => 'shop.add-product', 'middleware' => 'auth']);
Route::post('/shop/add-product', ['uses' => 'AddProductController@add', 'as' => 'shop.add-product', 'middleware' => 'auth']);
Route::get('/shop/shopping-cart', ['uses' => 'ProductController@getCart', 'as' => 'shop.shoppingCart', 'middleware' => 'auth']);
Route::post('/shop/checkout', ['uses' => 'ProductController@postCheckout', 'as' => 'checkout', 'middleware' => 'auth']);
