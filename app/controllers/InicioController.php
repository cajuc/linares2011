<?php

class InicioController extends BaseController{
	public function getIndex(){
		$slider_images = ObtenerRecursos::obtenerSliderImagesPublished();

		return View::make('inicio')->with(array('itemActive' => 'inicio', 'slider_images' => $slider_images['slider_images']));
	}

	// Ruta que controla el cierre de sesión y redirige a la página principal
	public function getLogout(){
		Auth::logout();

		return Redirect::back();
	}
}