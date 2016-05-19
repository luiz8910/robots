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

Route::get("meus-servicos", ["as" => "admin.servicos.index", "uses" => "ServicoController@index"]);

Route::get("add-servicos", ["as" => "admin.servicos.create", "uses" => "ServicoController@create"]);

Route::post("gravar-servicos", ["as" => "admin.servicos.store", "uses" => "ServicoController@store"]);

Route::get("edit-servicos/{id}", ["as" => "admin.servicos.edit", "uses" => "ServicoController@edit"]);

Route::get("excluir-servicos/{id}", ["as" => "admin.servicos.destroy", "uses" => "ServicoController@destroy"]);

Route::post("alterar-servicos/{id}", ["as" => "admin.servicos.update", "uses" => "ServicoController@update"]);


