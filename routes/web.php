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

// Administracion 

Route::get('administracion/{clase}/listar/{plural}', 'AdministracionController@listar')->name('administracion.clase.listar');

Route::post('administracion/agregar/{clase}', 'AdministracionController@agregar')->name('administracion.clase.agregar');

Route::get('administracion/cambiarestado/{clase}/{id}/', 'AdministracionController@cambiarestado')->name('administracion.clase.cambiarestado');

Route::get('administracion/quitar/{clase}/{id}/', 'AdministracionController@quitar')->name('administracion.clase.quitar');

Route::get('administracion/{clase}/buscar', 'AdministracionController@buscar')->name('administracion.clase.buscar');

Route::post('administracion/{clase}/filtar', 'AdministracionController@filtrar')->name('administracion.clase.filtrar');

Route::get('administracion/{clase}/resetearfiltrosclase', 'AdministracionController@resetearfiltrosclase')->name('administracion.clase.resetearfiltrosclase');


// Personas, ocupaciones, estados civiles, obras sociales

Route::get('/', 'PersonaController@index')->name('inicio');

Route::resource('personas', 'PersonaController');

Route::get('buscarpersona', 'PersonaController@buscar')->name('buscarpersona');

Route::post('personas/filtarpersonas', 'PersonaController@filtrar')->name('filtrarpersonas');

Route::get('resetearfiltrospersonas', 'PersonaController@resetearfiltrospersonas')->name('resetearfiltrospersonas');


Route::get('estadosciviles/listar', 'EstadoCivilController@listar')->name('estadosciviles.listar');

Route::get('ocupaciones/listar', 'OcupacionController@listar')->name('ocupaciones.listar');

Route::get('obrassociales/listar', 'ObraSocialController@listar')->name('obrassociales.listar');


// Historia Clinica 

Route::post('historiaclinica/{personaid}/{clase}/agregar/{tabla}', 'HistoriaClinicaController@agregar')->name('historiaclinica.clase.agregar');

Route::get('historiaclinica/{pacienteid}/{clase}/quitar/{id}/{tabla}', 'HistoriaClinicaController@quitar')->name('historiaclinica.clase.quitar');