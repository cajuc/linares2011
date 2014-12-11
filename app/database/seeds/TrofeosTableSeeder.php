<?php

class TrofeosTableSeeder extends Seeder{
	public function run(){
		// Instancia Faker
		$faker = Faker\Factory::create();

		// Array con el nombre de imagen de los trofeos
		$name_trofeoImage = array('trophy-1.png', 'trophy-2.png', 'trophy-3.png');

		$temporada = Temporada::whereActiva(1)->get()->first();

		foreach (range(1, 14) as $index) {
			Trofeo::create([
				'nombre' => 'Trofeo ' . $index,
				'temporada_id' => $temporada->id,
				'ganado_por' => $faker->name,
				'nombre_imagen' => $name_trofeoImage[rand(0,2)]
			]);
		}
	}
}