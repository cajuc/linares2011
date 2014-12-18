<?php

class ClubsTableSeeder extends Seeder{
	public function run(){
		Club::create([
			'nombre' => "Linares C.F"
		]);
	}
}