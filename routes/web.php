<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dlimage', function(){


    return view('/cesi/dlimage'); //to the dl images page
});

Route::get('/dlregistered', function(){


    return view('/sign/dlregistered'); //to the dl images page
});



