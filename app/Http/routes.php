<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* Serviços */

Route::get("meus-servicos", ["as" => "admin.servicos.index", "uses" => "ServicoController@index"]);

Route::get("add-servicos", ["as" => "admin.servicos.create", "uses" => "ServicoController@create"]);

Route::post("gravar-servicos", ["as" => "admin.servicos.store", "uses" => "ServicoController@store"]);

Route::get("edit-servicos/{id}", ["as" => "admin.servicos.edit", "uses" => "ServicoController@edit"]);

Route::get("excluir-servicos/{id}", ["as" => "admin.servicos.destroy", "uses" => "ServicoController@destroy"]);

Route::post("alterar-servicos/{id}", ["as" => "admin.servicos.update", "uses" => "ServicoController@update"]);

/* Fim Serviços */

/* Clientes */

Route::get("meus-clientes", ["as" => "admin.clientes.index", "uses" => "ClienteController@index"]);

Route::get("add-clientes", ["as" => "admin.clientes.create", "uses" => "ClienteController@create"]);

Route::get("edit-clientes/{id}", ["as" => "admin.clientes.edit", "uses" => "ClienteController@edit"]);

Route::post("gravar-clientes", ["as" => "admin.clientes.store", "uses" => "ClienteController@store"]);

Route::post("alterar-clientes/{id}", ["as" => "admin.clientes.update", "uses" => "ClienteController@update"]);

Route::get("excluir-clientes/{id}", ["as" => "admin.clientes.destroy", "uses" => "ClienteController@destroy"]);

/* Fim Clientes */
