<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('login', function(){
	return View::make('login');
});

Route::get('admin', 'AdminController@index');
Route::get('admin/nuevo', 'AdminController@nuevo');
Route::post('admin/guardar', 'AdminController@guardar');
Route::get('admin/modificar/{id}', 'AdminController@modificar');
Route::post('admin/modificar-single', 'AdminController@modificarSimple');
Route::get('admin/modificar-pass/{id}', 'AdminController@modificarPass');
Route::post('admin/modificar-pass', 'AdminController@updatePass');
Route::post('admin/eliminar', 'AdminController@eliminar');

Route::get('distribuidor', 'DistribuidorController@index');
Route::get('distribuidor/nuevo', 'DistribuidorController@nuevo');
Route::post('distribuidor/guardar', 'DistribuidorController@guardar');
Route::get('distribuidor/show/{id}', 'DistribuidorController@show');
Route::get('distribuidor/modificar/{id}', 'DistribuidorController@modificar');
Route::post('distribuidor/update','DistribuidorController@update');
Route::get('distribuidor/modificar-pass/{id}', 'DistribuidorController@pass');
Route::post('distribuidor/modificar-pass', 'DistribuidorController@updatePass');
Route::post('distribuidor/eliminar', 'DistribuidorController@eliminar');


Route::get('usuario/crear-usuario', 'UsuarioController@crearUsuario');

Route::post('usuario/guardar-usuario', 'UsuarioController@guardarUsuario');

Route::post('usuario/login','UsuarioController@login');