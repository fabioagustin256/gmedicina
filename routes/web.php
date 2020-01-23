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

// Personas, ocupaciones, estados civiles, obras sociales

Route::get('/', 'PersonaController@index')->name('inicio');

Route::resource('personas', 'PersonaController');


Route::get('estadosciviles/listar', 'EstadoCivilController@listar')->name('estadosciviles.listar');

Route::get('ocupaciones/listar', 'OcupacionController@listar')->name('ocupaciones.listar');

Route::get('obrassociales/listar', 'ObraSocialController@listar')->name('obrassociales.listar');