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
//        Route::get('{id}', ['as' => 'maquinas.laboratorios', 'uses' => 'MaquinasController@getMaquinas']);
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
        Route::get('relatorio', ['as' => 'salas.get', 'uses' => 'SalasController@getSalas']);
    });

    //MANUTENÇÃO
    Route::group(['prefix' => 'manutencao'], function() {
        Route::get('/', ['as' => 'manutencao', 'uses' => 'ManutencaoController@index']);
        Route::get('{id}/add', ['as' => 'manutencao.add', 'uses' => 'ManutencaoController@store']);
        Route::post('add', ['as' => 'manutencao.create', 'uses' => 'ManutencaoController@create']);
        Route::get('{id}/info', ['as' => 'manutencao.show', 'uses' => 'ManutencaoController@show']);
        Route::get('{id}/edit', ['as' => 'manutencao.edit', 'uses' => 'ManutencaoController@edit']);
        Route::post('{id}/edit', ['as' => 'manutencao.update', 'uses' => 'ManutencaoController@update']);
        Route::delete('{id}', ['as' => 'manutencao.delete', 'uses' => 'ManutencaoController@destroy']);
        Route::get('relatorio', ['as' => 'manutencao.get', 'uses' => 'ManutencaoController@getManutencao']);
    });

    //PEDIDOS
    Route::group(['prefix' => 'pedidos'], function() {
        Route::get('/', ['as' => 'pedidos', 'uses' => 'PedidosController@index']);
        Route::get('add', ['as' => 'pedidos.add', 'uses' => 'PedidosController@store']);
        Route::post('add', ['as' => 'pedidos.create', 'uses' => 'PedidosController@create']);
        Route::get('{id}/info', ['as' => 'pedidos.show', 'uses' => 'PedidosController@show']);
        Route::get('{id}/edit', ['as' => 'pedidos.edit', 'uses' => 'PedidosController@edit']);
        Route::post('{id}/edit', ['as' => 'pedidos.update', 'uses' => 'PedidosController@update']);
        Route::delete('{id}', ['as' => 'pedidos.delete', 'uses' => 'PedidosController@destroy']);
        Route::get('{id}', ['as' => 'pedidos.laboratorios', 'uses' => 'MaquinasController@getMaquinas']);
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
        Route::get('relatorio', ['as' => 'usuarios.get', 'uses' => 'UsuariosController@getUsuarios']);
    });
    //PROBLEMAS
    Route::group(['prefix' => 'problemas'], function() {
        Route::get('/', ['as' => 'problemas', 'uses' => 'ProblemasController@index']);
        Route::get('add', ['as' => 'problemas.add', 'uses' => 'ProblemasController@store']);
        Route::post('add', ['as' => 'problemas.create', 'uses' => 'ProblemasController@create']);
        Route::get('{id}/info', ['as' => 'problemas.show', 'uses' => 'ProblemasController@show']);
        Route::get('{id}/edit', ['as' => 'problemas.edit', 'uses' => 'ProblemasController@edit']);
        Route::post('{id}/edit', ['as' => 'problemas.update', 'uses' => 'ProblemasController@update']);
        Route::delete('{id}', ['as' => 'problemas.delete', 'uses' => 'ProblemasController@destroy']);
        Route::get('relatorio', ['as' => 'problemas.get', 'uses' => 'ProblemasController@getProblemas']);
    });

    //RELATÓRIOS
    Route::group(['prefix' => 'relatorios'], function() {
        Route::get('dispositivos', ['as' => 'relatorios.dispositivos', 'uses' => 'RelatoriosController@indexDispositivos']);
        Route::post('dispositivos/gerar', ['as' => 'dispositivos.gerar', 'uses' => 'RelatoriosController@relDipositivos']);

        Route::get('salas/gerar', ['as' => 'salas.gerar', 'uses' => 'RelatoriosController@relSalas']);

        Route::get('usuarios/gerar', ['as' => 'usuarios.gerar', 'uses' => 'RelatoriosController@relUsuarios']);

//        Route::get('manutencoes', ['as' => 'relatorios.manutencoes', 'uses' => 'RelatoriosController@indexManutencoes']);
        Route::get('manutencoes/gerar', ['as' => 'manutencoes.gerar', 'uses' => 'RelatoriosController@relManutencao']);

        Route::get('pedidos', ['as' => 'relatorios.pedidos', 'uses' => 'RelatoriosController@indexPedidos']);
        Route::post('pedidos/gerar', ['as' => 'pedidos.gerar', 'uses' => 'RelatoriosController@relPedidos']);

        Route::get('maquinas', ['as' => 'maquinas.get', 'uses' => 'MaquinasController@teste']);
    });

//    //Tipo Manutenção
    Route::group(['prefix' => 'tipoManutencao'], function() {
        Route::get('/', ['as' => 'tipoManutencao', 'uses' => 'tipoManutencaoController@index']);
        Route::get('add', ['as' => 'tipoManutencao.add', 'uses' => 'tipoManutencaoController@store']);
        Route::post('add', ['as' => 'tipoManutencao.create', 'uses' => 'tipoManutencaoController@create']);
        Route::get('{id}/info', ['as' => 'tipoManutencao.show', 'uses' => 'tipoManutencaoController@show']);
        Route::get('{id}/edit', ['as' => 'tipoManutencao.edit', 'uses' => 'tipoManutencaoController@edit']);
        Route::post('{id}/edit', ['as' => 'tipoManutencao.update', 'uses' => 'tipoManutencaoController@update']);
        Route::delete('{id}', ['as' => 'tipoManutencao.delete', 'uses' => 'tipoManutencaoController@destroy']);
        Route::get('relatorio', ['as' => 'tipoManutencao.get', 'uses' => 'tipoManutencaoController@getProblemas']);
    });
    //Tipo Usuario
    Route::group(['prefix' => 'tipoUser'], function() {
        Route::get('/', ['as' => 'tipoUser', 'uses' => 'tipoUserController@index']);
        Route::get('add', ['as' => 'tipoUser.add', 'uses' => 'tipoUserController@store']);
        Route::post('add', ['as' => 'tipoUser.create', 'uses' => 'tipoUserController@create']);
        Route::get('{id}/info', ['as' => 'tipoUser.show', 'uses' => 'tipoUserController@show']);
        Route::get('{id}/edit', ['as' => 'tipoUser.edit', 'uses' => 'tipoUserController@edit']);
        Route::post('{id}/edit', ['as' => 'tipoUser.update', 'uses' => 'tipoUserController@update']);
        Route::delete('{id}', ['as' => 'tipoUser.delete', 'uses' => 'tipoUserController@destroy']);
        Route::get('relatorio', ['as' => 'tipoUser.get', 'uses' => 'tipoUserController@getProblemas']);
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
