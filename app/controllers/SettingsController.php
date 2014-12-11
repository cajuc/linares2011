<?php

class SettingsController extends BaseController{
	public function __construct(){
		$this->beforeFilter(function(){
			if (!Auth::check()) {
				return Redirect::to('/');
			}
		});
	}	

	public function getIndex(){
		return "Hola holita";
	}
}