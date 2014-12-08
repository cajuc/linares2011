<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $fillable = array("username", "password", "admin", "remember_token");

	// Roles de validación
	public static $rules = array('username' => 'required', 'password' => 'required');

	// Mensajes personalizados
	public static $messages = array(
		'required' => 'Debes rellenar el :attribute',
	);

	// Mensajes de error
	public static $errors;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	// Retorna valor boolean dependiendo si pasa la validación o no
	public static function isValid($data){
		$validation = Validator::make($data, static::$rules, static::$messages);

		if ($validation->passes()) {
			return true;
		}

		static::$errors = $validation->messages();

		return false;
	}
}
