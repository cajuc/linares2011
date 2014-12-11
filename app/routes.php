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

// Route::get('/', function()
// {
// 	return View::make('hello');
// });

// Controlador para manejar la URI 'admin'
Route::controller('admin', 'AdminController');

// Controlador para manejar la URI 'categoria'
Route::get('categoria/{equipo}/plantilla', 'CategoriaController@showTemplate');
Route::controller('categoria', 'CategoriaController');

// Controlador para manejar la URI 'trofeos'
Route::controller('trofeos', 'TrofeosController');

// Controlador para manejar la URI 'settings'
Route::controller('settings', 'SettingsController');

// Controlador para manejar la URI 'inicio'
Route::controller('/', 'InicioController');
