<?php

class UsersTableSeeder extends Seeder{
	public function run(){
		User::create(array(
			'username' => 'admin',
			'password' => Hash::make('admin'),
			'admin' => 1
		));
	}
}