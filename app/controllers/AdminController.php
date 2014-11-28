<?php

class AdminController extends BaseController{

	public function getIndex(){
		return View::make("admin.admin");
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
			return 'Logged in';
		}

	}

	public function getCrear(){
		User::create(array(
			'username' => 'carlos',
			'password' => Hash::make('carlos'),
			'admin' => 1
		));

		return 'User created';
	}
}