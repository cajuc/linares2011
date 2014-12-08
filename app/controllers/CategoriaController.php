<?php

class CategoriaController extends BaseController{
	public function showTemplate($equipo){
		// Integrantes del equipo
		$integrantes = ObtenerRecursos::obtenerIntegrantes($equipo);

		// Jugadores del equipo
		$jugadores = ObtenerRecursos::obtenerJugadores($integrantes);

		// Técnicos del equipo
		$tecnicos = ObtenerRecursos::obtenerTecnicos($integrantes);

		return View::make('categoria')->with(array(
			'jugadores' => $jugadores,
			'tecnicos' => $tecnicos,
			'itemActive' => 'categoria'
		));
	}
}