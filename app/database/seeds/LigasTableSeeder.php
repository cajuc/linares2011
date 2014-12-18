<?php

class LigasTableSeeder extends Seeder{
	public function run(){
		Liga::create([
			'nombre' => "Tercera Andaluza"
		]);

		Liga::create([
			'nombre' => "Segunda Andaluza"
		]);

		Liga::create([
			'nombre' => "3a División"
		]);
	}
}