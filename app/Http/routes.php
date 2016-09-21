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

Route::get('/', ["as" => "admin.dashboard.index", "uses" => "DashboardController@index"]);

//---------------------------------------- Serviços -----------------------------------------------------///

Route::get("meus-servicos", ["as" => "admin.servicos.index", "uses" => "ServicoController@index"]);

Route::get("add-servicos", ["as" => "admin.servicos.create", "uses" => "ServicoController@create"]);

Route::post("gravar-servicos", ["as" => "admin.servicos.store", "uses" => "ServicoController@store"]);

Route::get("edit-servicos/{id}", ["as" => "admin.servicos.edit", "uses" => "ServicoController@edit"]);

Route::get("excluir-servicos/{id}", ["as" => "admin.servicos.destroy", "uses" => "ServicoController@destroy"]);

Route::post("alterar-servicos/{id}", ["as" => "admin.servicos.update", "uses" => "ServicoController@update"]);

/* Fim Serviços */

//------------------------------------------ Clientes -----------------------------------------------------///

Route::get("meus-clientes", ["as" => "admin.clientes.index", "uses" => "ClienteController@index"]);

Route::get("add-clientes", ["as" => "admin.clientes.create", "uses" => "ClienteController@create"]);

Route::get("edit-clientes/{id}", ["as" => "admin.clientes.edit", "uses" => "ClienteController@edit"]);

Route::post("gravar-clientes", ["as" => "admin.clientes.store", "uses" => "ClienteController@store"]);

Route::post("alterar-clientes/{id}", ["as" => "admin.clientes.update", "uses" => "ClienteController@update"]);

Route::get("excluir-clientes/{id}", ["as" => "admin.clientes.destroy", "uses" => "ClienteController@destroy"]);

/* Fim Clientes */

//------------------------------------------- Quem Somos ----------------------------------------------------//

Route::get("listar-quem-somos", ["as" => "admin.quem-somos.index", "uses" => "QuemSomosController@index"]);

Route::get("add-quem-somos", ["as" => "admin.quem-somos.create", "uses" => "QuemSomosController@create"]);

Route::get("edit-quem-somos/{id}", ["as" => "admin.quem-somos.edit", "uses" => "QuemSomosController@edit"]);

Route::post("gravar-quem-somos", ["as" => "admin.quem-somos.store", "uses" => "QuemSomosController@store"]);

Route::post("alterar-quem-somos/{form}", ["as" => "admin.quem-somos.update", "uses" => "QuemSomosController@update"]);

Route::get("excluir-quem-somos/{id}", ["as" => "admin.quem-somos.destroy", "uses" => "QuemSomosController@destroy"]);

// ----------------------------- Textos Missão, Valores e Visão  ----------------------------------- //

Route::get("edit-institucional", ["as" => "admin.institucional.edit", "uses" => "institucionalController@edit"]);

Route::post("alterar-institucional", ["as" => "admin.institucional.update", "uses" => "institucionalController@update"]);

/* Fim Quem Somos */

//-----------------------------------------  Equipe ------------------------------------------------------------

Route::get('equipe', ['as' => 'admin.equipe.index', 'uses' => 'EquipeController@index']);

Route::get('add-equipe', ['as' => 'admin.equipe.create', 'uses' => 'EquipeController@create']);

/* Fim Equipe */

//-----------------------------------------  Usuários ------------------------------------------------------------

Route::get('usuarios', ['as' => 'admin.usuarios.index', 'uses' => 'UserController@index']);

Route::get('add-usuarios', ['as' => 'admin.usuarios.create', 'uses' => 'UserController@create']);

Route::get('edit-usuarios', ['as' => 'admin.usuarios.edit', 'uses' => 'UserController@edit']);

/* Fim Usuários */

//-----------------------------------------  Parceiros ------------------------------------------------------------

Route::get('meus-parceiros', ['as' => 'admin.parceiros.index', 'uses' => 'ParceiroController@index']);

Route::get('add-parceiros', ['as' => 'admin.parceiros.create', 'uses' => 'ParceiroController@create']);

//-----------------------------------------  Slides ------------------------------------------------------------

/* Fim Slides */

//-----------------------------------------  Config Email ------------------------------------------------------------

Route::get('config-email', function(){
    return view('admin.contato.config');
});

//------------------------------------------  Site -------------------------------------------------------------------

Route::get('quemsomos', 'QuemSomosController@indexSite');

Route::post('newsletter/{email}', 'ControllerNewsletter@store');