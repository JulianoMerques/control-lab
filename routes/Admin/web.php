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
<<<<<<< HEAD
//    Route::get('/', function () {
//        return view('welcome');
//    });

    Route::get('/home',['as' => 'dashboard', 'uses' => 'AdminController@index']);

    //MAQUINAS
    Route::group(['prefix' => 'maquinas'], function() {
        Route::get('/', ['as' => 'maquinas', 'uses' => 'MaquinasController@index']);
        Route::get('add', ['as' => 'maquinas.add', 'uses' => 'MaquinasController@store']);
        Route::post('add', ['as' => 'maquinas.create', 'uses' => 'MaquinasController@create']);
        Route::get('{id}/info', ['as' => 'maquinas.show', 'uses' => 'MaquinasController@show']);
        Route::get('{id}/edit', ['as' => 'maquinas.edit', 'uses' => 'MaquinasController@edit']);
        Route::post('{id}/edit', ['as' => 'maquinas.update', 'uses' => 'MaquinasController@update']);
        Route::delete('{id}', ['as' => 'maquinas.delete', 'uses' => 'MaquinasController@destroy']);
    });

    //LABORATÓRIOS
    Route::group(['prefix' => 'laboratorios'], function() {

    });

    //MANUTENÇÃO
    Route::group(['prefix' => 'manutencao'], function() {

    });

    //PEDIDOS
    Route::group(['prefix' => 'pedidos'], function() {

    });

    //USUARIOS
    Route::group(['prefix' => 'usuarios'], function() {

    });
});


=======
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'AdminController@index');

    Route::get('/teste', function(){
        return 'Testando..';
    });
});
>>>>>>> c7ae111ba3cceef0f9a08bac549e4b3df7f78363
Route::group(['prefix' => 'user'], function(){
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'AdminController@index');

    Route::get('/teste', function(){
        return 'Testando..';
    });
});
