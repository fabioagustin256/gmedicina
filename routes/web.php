<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


// Administracion 

Route::get('administracion/{clase}/listar/{plural}', 'AdministracionController@listar')->name('administracion.clase.listar')->middleware('auth', 'role:admin');

Route::post('administracion/agregar/{clase}', 'AdministracionController@agregar')->name('administracion.clase.agregar')->middleware('auth', 'role:admin');

Route::get('administracion/cambiarestado/{clase}/{id}/', 'AdministracionController@cambiarestado')->name('administracion.clase.cambiarestado')->middleware('auth', 'role:admin');

Route::get('administracion/quitar/{clase}/{id}/', 'AdministracionController@quitar')->name('administracion.clase.quitar')->middleware('auth', 'role:admin');

Route::get('administracion/{clase}/buscar', 'AdministracionController@buscar')->name('administracion.clase.buscar')->middleware('auth', 'role:admin');

Route::post('administracion/{clase}/filtar', 'AdministracionController@filtrar')->name('administracion.clase.filtrar')->middleware('auth', 'role:admin');

Route::get('administracion/{clase}/resetearfiltrosclase', 'AdministracionController@resetearfiltrosclase')->name('administracion.clase.resetearfiltrosclase')->middleware('auth', 'role:admin');

Route::get('administracion/personas/eliminados/listar', 'PersonaController@listar_eliminados')->name('personas.listar_eliminados')->middleware('auth', 'role:admin');

Route::get('administracion/personas/eliminados/{id}/recuperar', 'PersonaController@recuperar_eliminado')->name('personas.recuperar_eliminado')->middleware('auth', 'role:admin');


// Personas, ocupaciones, estados civiles, obras sociales

Route::get('/', 'PersonaController@index')->name('inicio');

Route::resource('personas', 'PersonaController');

Route::get('buscarpersona', 'PersonaController@buscar')->name('buscarpersona');

Route::post('personas/filtarpersonas', 'PersonaController@filtrar')->name('filtrarpersonas');

Route::get('resetearfiltrospersonas', 'PersonaController@resetearfiltrospersonas')->name('resetearfiltrospersonas');

Route::post('personas/importar', 'PersonaController@importar')->name('personas.importar')->middleware('auth', 'role:admin');


Route::get('estadosciviles/listar', 'EstadoCivilController@listar')->name('estadosciviles.listar');

Route::get('ocupaciones/listar', 'OcupacionController@listar')->name('ocupaciones.listar');

Route::get('obrassociales/listar', 'ObraSocialController@listar')->name('obrassociales.listar');


// Historia Clinica 

Route::post('historiaclinica/{personaid}/{clase}/agregar/{tabla}', 'HistoriaClinicaController@agregar')->name('historiaclinica.clase.agregar')->middleware('auth', 'role:admin');

Route::get('historiaclinica/{personaid}/{clase}/editar/{id}/{formulario}', 'HistoriaClinicaController@editar')->name('historiaclinica.clase.editar')->middleware('auth', 'role:admin');

Route::get('historiaclinica/{personaid}/{clase}/quitar/{id}/{tabla}', 'HistoriaClinicaController@quitar')->name('historiaclinica.clase.quitar')->middleware('auth', 'role:admin');




Route::post('galeriafotos/{persona}', 'GaleriaFotoController@cargar_foto')->name('galeriafotos.cargar_foto')->middleware('auth', 'role:admin');

Route::get('galeriafotos/{persona}/{id}', 'GaleriaFotoController@eliminar')->name('galeriafotos.eliminar')->middleware('auth', 'role:admin');


