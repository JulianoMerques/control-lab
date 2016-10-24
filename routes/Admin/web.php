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
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'AdminController@index');

    Route::get('/teste', function(){
        return 'Testando..';
    });
});
Route::group(['prefix' => 'user'], function(){
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'AdminController@index');

    Route::get('/teste', function(){
        return 'Testando..';
    });
});
