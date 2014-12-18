<?php

class AdminController extends BaseController{

	public function getIndex(){
		return View::make("admin.index");
	}

	public function postIndex(){
		
		// Comprobar que se rellenan los inputs
		if (! User::isValid(Input::all())) {
			return Redirect::back()->withInput()->withErrors(User::$errors);		
		}

		$credentials = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);

		if (Auth::attempt($credentials)) {
			return Redirect::to('/');
		}

		return Redirect::back()->with('invalid', 'El usuario y/o contraseña son erroneos');
	}
}