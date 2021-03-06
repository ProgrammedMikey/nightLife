<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//
////    $stevenmaguire = $this->app->make('stevenmaguire');
////    dd($stevenmaguire->search(array('term' => 'Sushi', 'location' => 'kissimmee')));
//
////   dd(Stevenmaguire::search(array('term' => 'Sushi', 'location' => 'kissimmee')));
//    return view('welcome');
//});

Route::group(['middleware' => ['web']], function() {
    Route::get('/', [
        'uses' => 'HomeController@index',
        'as' => 'index'
    ]);
    Route::post('/new', [
        'uses' => 'HomeController@storeYelp',
        'as' => 'create'
    ]);
    Route::post('/new/like', [
        'uses' => 'HomeController@postLikePost',
        'as' => 'like'
    ]);
});


Auth::routes();

//Route::get('/home', 'HomeController@index');
