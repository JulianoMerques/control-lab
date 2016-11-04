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

//    Route::get('/', function () {
//        return view('welcome');
//    });

    Route::get('/home',['as' => 'dashboard', 'uses' => 'AdminController@index']);

    //Dispositivos
    Route::group(['prefix' => 'maquinas'], function() {
        Route::get('/', ['as' => 'maquinas', 'uses' => 'MaquinasController@index']);
        Route::get('add', ['as' => 'maquinas.add', 'uses' => 'MaquinasController@store']);
        Route::post('add', ['as' => 'maquinas.create', 'uses' => 'MaquinasController@create']);
        Route::get('{id}/info', ['as' => 'maquinas.show', 'uses' => 'MaquinasController@show']);
        Route::get('{id}/edit', ['as' => 'maquinas.edit', 'uses' => 'MaquinasController@edit']);
        Route::post('{id}/edit', ['as' => 'maquinas.update', 'uses' => 'MaquinasController@update']);
        Route::delete('{id}', ['as' => 'maquinas.delete', 'uses' => 'MaquinasController@destroy']);
    });

    //SALAS
    Route::group(['prefix' => 'salas'], function() {
        Route::get('/', ['as' => 'salas', 'uses' => 'SalasController@index']);
        Route::get('add', ['as' => 'salas.add', 'uses' => 'SalasController@store']);
        Route::post('add', ['as' => 'salas.create', 'uses' => 'SalasController@create']);
        Route::get('{id}/info', ['as' => 'salas.show', 'uses' => 'SalasController@show']);
        Route::get('{id}/edit', ['as' => 'salas.edit', 'uses' => 'SalasController@edit']);
        Route::post('{id}/edit', ['as' => 'salas.update', 'uses' => 'SalasController@update']);
        Route::delete('{id}', ['as' => 'salas.delete', 'uses' => 'SalasController@destroy']);
    });

    //MANUTENÇÃO
    Route::group(['prefix' => 'manutencao'], function() {

    });

    //PEDIDOS
    Route::group(['prefix' => 'pedidos'], function() {

    });

    //USUARIOS
    Route::group(['prefix' => 'usuarios'], function() {
        Route::get('/', ['as' => 'usuarios', 'uses' => 'UsuariosController@index']);
        Route::get('add', ['as' => 'usuarios.add', 'uses' => 'UsuariosController@store']);
        Route::post('add', ['as' => 'usuarios.create', 'uses' => 'UsuariosController@create']);
        Route::get('{id}/info', ['as' => 'usuarios.show', 'uses' => 'UsuariosController@show']);
        Route::get('{id}/edit', ['as' => 'usuarios.edit', 'uses' => 'UsuariosController@edit']);
        Route::post('{id}/edit', ['as' => 'usuarios.update', 'uses' => 'UsuariosController@update']);
        Route::delete('{id}', ['as' => 'usuarios.delete', 'uses' => 'UsuariosController@destroy']);
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
