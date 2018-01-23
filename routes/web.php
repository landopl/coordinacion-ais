<?php

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

	Route::resource('usuarios', 'usuariosControlador');// resource toma los metodos de un controlador y los define como un estilo de rutas

	Route::resource('lineas', 'lineasControlador'); // resource recibe dos parametros, el nombre que se le define para la ruta y el otro es el controlador que va a tomar para definir todas esas rutas

	Route::resource('proyectos', 'proyectosControlador');

	Route::resource('investigadores', 'investigadoresControlador');

	Route::resource('coordinadores', 'coordinadoresControlador');


	//Route::resource('sesion', 'loginControlador');

	//ruta tipo get.  envia el id del proyecto para ser eliminado con el metodo destry. 'uses' es para definir que controlador usara y seguido de @destroy que se refiere al metodo que esta dentro del controlador.  'as' es para definir la direccion de la vista

	Route::get('investigadores/{id}/destroy', [
		'uses' => 'investigadoresControlador@destroy',
		'as'   => 'admin.investigadores.destroy'
	]);

	Route::get('lineas/{id}/destroy', [
		'uses' => 'lineasControlador@destroy',
		'as'   => 'admin.lineas.destroy'
	]);

	Route::get('proyectos/{id}/destroy', [
		'uses' => 'proyectosControlador@destroy',
		'as'   => 'admin.proyectos.destroy'
	]);

	Route::get('coordinadores/{id}/destroy', [
		'uses' => 'coordinadoresControlador@destroy',
		'as'   => 'admin.coordinadores.destroy'
	]);

});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
