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
	return Redirect::to('usuario/index');
});


Route::get('login', function(){
	if(Auth::check())
	{
		return Redirect::to('usuario/index');
	}else{
		return View::make('login');
	}
});

Route::post('usuario/login','UsuarioController@login');

//secciones con login
Route::group(array('before' => 'auth'),function(){

Route::get('usuario/index', 'UsuarioController@index');
Route::get('usuario/logout', 'UsuarioController@logout');

//Route::resource('admin', 'AdminController');

Route::get('admin', 'AdminController@index');
Route::get('admin/nuevo', 'AdminController@nuevo');
Route::post('admin/guardar', 'AdminController@guardar');
Route::get('admin/edit/{id}', 'AdminController@modificar');
Route::post('admin/modificar-single', 'AdminController@modificarSimple');
Route::get('admin/modificar-pass/{id}', 'AdminController@modificarPass');
Route::post('admin/modificar-pass', 'AdminController@updatePass');
Route::delete('admin/eliminar/{id}/{usuario_id}', 'AdminController@eliminar');


/** Distribuidor **/
Route::get('distribuidor/nuevo', 'DistribuidorController@nuevo');
Route::post('distribuidor/guardar', 'DistribuidorController@guardar');
Route::get('distribuidor/show/{id}', 'DistribuidorController@show');
Route::post('distribuidor/update','DistribuidorController@update');
Route::get('distribuidor/modificar-pass/{id}', 'DistribuidorController@pass');
Route::post('distribuidor/modificar-pass', 'DistribuidorController@updatePass');

Route::get('distribuidor', 
	array('as' => 'distribuidor.index','uses'=>'DistribuidorController@index')
);
Route::get('distribuidor/show/{id}', 
	array('as' => 'distribuidor.show','uses'=>'DistribuidorController@show')
);
Route::get('distribuidor/modificar-referencia/{id}', 
	array('as' => 'distribuidor.modificarReferencia','uses'=>'DistribuidorController@modificarReferencia')
);
Route::post('distribuidor/update-referencia', 
	array('as' => 'distribuidor.updateReferencia','uses'=>'DistribuidorController@updateReferencia')
);
Route::get('distribuidor/actual/{id}', 
	array('as' => 'distribuidor.alone','uses'=>'DistribuidorController@alone')
);
Route::get('distribuidor/create-referencia/{id}', 
	array('as' => 'distribuidor.createReferencia','uses'=>'DistribuidorController@createReferencia')
);
Route::any('distribuidor/save-referencia',
	array('as' =>'distribuidor.saveReferencia', 'uses' => 'DistribuidorController@saveReferencia')
);
Route::delete('distribuidor/drop-referencia/{id}',
	array('as' =>'distribuidor.dropReferencia', 'uses' => 'DistribuidorController@dropReferencia')
);
Route::get('distribuidor/modificar/{id}',
	array('as' =>'distribuidor.modificar', 'uses' => 'DistribuidorController@modificar')
);
Route::post('distribuidor/drop/{id}',
	array('as' =>'distribuidor.drop', 'uses' => 'DistribuidorController@drop')
);


Route::get('usuario/crear-usuario', 'UsuarioController@crearUsuario');

Route::post('usuario/guardar-usuario', 'UsuarioController@guardarUsuario');



Route::resource('statuses', 'StatusesController');


/* Entrega */
Route::resource('entrega', 'EntregaController');

Route::get('entrega/edit-password/{id}',
	array('as' =>'entrega.editPassword', 'uses' => 'EntregaController@editPassword')
);

Route::patch('entrega/update-pass/{id}',
	array('as' =>'entrega.updatePass', 'uses' => 'EntregaController@updatePass')
);

Route::delete('entrega/drop/{id}','EntregaController@destroy');


//ORDEN COMPRA
Route::resource('orden-compra', 'OrdenCompraController');

Route::get('orden-compra/show/{id}', 
	array('as' => 'ordencompra.show','uses'=>'OrdenCompraController@show')
);
Route::get('orden-compra/detalle/{id}', 'OrdenCompraController@detalle');

//ORDEN PRODUCTO
Route::get('orden-producto/detalle/{id}', 'OrdenProductoController@detalle');
Route::post('orden-producto/save-status', 'OrdenProductoController@saveStatus');

});



Route::resource('tipo_productos', 'Tipo_productosController');

Route::resource('vigencia', 'VigenciaController');