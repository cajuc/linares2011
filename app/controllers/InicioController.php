<?php

class InicioController extends BaseController{
	public function getIndex(){
		return View::make('inicio');
	}

	// Ruta que controla el cierre de sesión y redirige a la página principal
	public function getLogout(){
		Auth::logout();

		return Redirect::back();
	}
}