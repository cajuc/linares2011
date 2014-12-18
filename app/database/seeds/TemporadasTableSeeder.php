<?php

class TemporadasTableSeeder extends Seeder{
	public function run(){
		Temporada::create([
			'periodo' => "2013/2014",
			'activa' => 1
		]);

		Temporada::create([
			'periodo' => "2012/2013"
		]);
	}
}