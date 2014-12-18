<?php

class TrofeosTableSeeder extends Seeder{
	public function run(){
		// Instancia Faker
		$faker = Faker\Factory::create();

		// Array con el nombre de imagen de los trofeos
		$name_trofeoImage = array('trophy-1.png', 'trophy-2.png', 'trophy-3.png', 'trophy-4.gif', 'trophy-5.gif');
		$equipos = array("Senior", "Juvenil A", "Cadete B");
		$nombres = array("Liga", "Copa Disputación", "Copa Delegado");

		$temporada = Temporada::whereActiva(1)->get()->first();

		foreach (range(1, 12) as $index) {
			Trofeo::create([
				'nombre' => $nombres[rand(0,2)],
				'temporada_id' => $temporada->id,
				'ganado_por' => $equipos[rand(0,2)],
				'nombre_imagen' => $name_trofeoImage[rand(0,2)]
			]);
		}
	}
}