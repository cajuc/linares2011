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

Route::get('/', function()
{
	$equipos = Equipo::find(1)->jornadasLocal;
	$lista = '<ul>';

	foreach($equipos as $equipo){
		$lista .= '<li>';
		$lista .= '<h2>Equipo: ' . $equipo->equipoLocal['nombre'] . '</h2>';
		$lista .= '<p>Numero de jornada: ' . $equipo['n_jornada'] . '</p>';
		$lista .= '</li>';
	}
	$lista .= '</ul>';
	return $lista;
	// return var_dump($equipos);
});