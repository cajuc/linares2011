<?php

class InicioController extends BaseController{
	public function getIndex(){
		return View::make('inicio');
	}
}