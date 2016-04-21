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
|	GET, POST, PUT, DELETE, RESOURCE
|
*/

Route::get('/', ['as' => 'index', function () {
	return view('pagina.index');
}]);

Route::get('/funciones', ['as' => 'funciones', function () {
	return view('pagina.funciones');
}]);

Route::get('/servicios', ['as' => 'servicios', function () {
	return view('pagina.servicios');
}]);

Route::get('/empresa', ['as' => 'empresa', function () {
	return view('pagina.empresa');
}]);

Route::get('/contactanos', [
	'uses' => 'contacto_controller@index',
	'as' => 'contactanos'
	]);

Route::post('enviar', [
	'uses' => 'contacto_controller@store',
	'as' => 'contactanos.enviar'
	]);

// Authentication routes...
Route::get('login', [
	'uses'	=>	'Auth\AuthController@getLogin',
	'as'	=>	'pagina.login'
	]);

Route::post('login', [
	'uses'	=>	'Auth\AuthController@postLogin',
	'as'	=>	'pagina.login'
	]);

Route::get('logout', [
	'uses'	=>	'Auth\AuthController@getLogout',
	'as'	=>	'pagina.logout'
	]);

Route::get('/panel', ['as' => 'panel', function () {
	return view('pagina/funcionalidad/panel');
}]);


Route::get('/test', function () {
	return view('pagina/funcionalidad/panel2');
});

Route::get('ajax_periodo/{periodo}/ajax/{ano}', [
	'uses'	=>	'periodo_turno_controller@ajax_periodoo',
	'as'	=>	'periodo_turno.ajax_periodo'
	]);


Route::group(['prefix' => 'admin'], function(){

	Route::resource('usuarios', 'usuarios_controller');

	Route::get('usuarios/{id}/destroy', [
		'uses'	=>	'usuarios_controller@destroy',
		'as'	=>	'admin.usuarios.destroy'
		]);
});

Route::group(['prefix' => 'admin'], function(){

	Route::resource('perfil', 'perfil_controller');

});

Route::group(['prefix' => 'admin'], function(){

	Route::resource('medicos', 'medicos_controller');

	Route::get('medicos/{id}/destroy', [
		'uses'	=>	'medicos_controller@destroy',
		'as'	=>	'admin.medicos.destroy'
		]);
});

Route::group(['prefix' => 'admin'], function(){

	Route::resource('pacientes', 'pacientes_controller');

	Route::get('pacientes/{id}/destroy', [
		'uses'	=>	'pacientes_controller@destroy',
		'as'	=>	'admin.pacientes.destroy'
		]);
});

Route::group(['prefix' => 'admin'], function(){

	Route::resource('empleados', 'empleados_controller');

	Route::get('empleados/{id}/destroy', [
		'uses'	=>	'empleados_controller@destroy',
		'as'	=>	'admin.empleados.destroy'
		]);
});

Route::group(['prefix' => 'admin'], function(){

	Route::resource('especialidad', 'especialidad_controller');

	Route::get('especialidad/{id}/destroy', [
		'uses'	=>	'especialidad_controller@destroy',
		'as'	=>	'admin.especialidad.destroy'
		]);
});

Route::group(['prefix' => 'admin'], function(){

	Route::resource('periodo_turno', 'periodo_turno_controller');

	Route::get('periodo_turno/{id}/destroy', [
		'uses'	=>	'periodo_turno_controller@destroy',
		'as'	=>	'admin.periodo_turno.destroy'
		]);
});

Route::group(['prefix' => 'admin'], function(){

	Route::resource('turnos', 'turnos_controller');

	Route::get('turnos/{id}/destroy', [
		'uses'	=>	'turnos_controller@destroy',
		'as'	=>	'admin.turnos.destroy'
		]);
	Route::get('turnos/{id}/asignar', [
		'uses'	=>	'turnos_controller@asignar',
		'as'	=>	'admin.turnos.asignar'
		]);
});

Route::group(['prefix' => 'admin'], function(){

	Route::resource('periodo_cita', 'periodo_cita_controller');

	Route::get('periodo_cita/{id}/destroy', [
		'uses'	=>	'periodo_cita_controller@destroy',
		'as'	=>	'admin.periodo_cita.destroy'
		]);
});

Route::group(['prefix' => 'admin'], function(){

	Route::resource('citas', 'citas_controller');

	Route::get('citas/{id}/destroy', [
		'uses'	=>	'citas_controller@destroy',
		'as'	=>	'admin.citas.destroy'
		]);
	Route::get('citas/{id}/atender', [
		'uses'	=>	'citas_controller@atender',
		'as'	=>	'admin.citas.atender'
		]);
});


Route::get('error', [
	'uses'	=>	'errores_controller@index',
	'as'	=>	'error.pagina'
	]);
