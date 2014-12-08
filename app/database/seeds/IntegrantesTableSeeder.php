<?php

class IntegrantesTableSeeder extends Seeder{
	public function run(){
		// Instancia Faker
		$faker = Faker\Factory::create();

		// Seed porteros
		foreach (range(1, 2) as $index) {
			Integrante::create([
				'equipo_id' => 1,
				'nombre' => $faker->name,
				'nombre_imagen' => 'player.jpeg',
				'es_tecnico' => 0
			]);

			$integrante = Integrante::all();
			$integrante = $integrante->last();

			Ficha::create([
				'integrante_id' => $integrante->id,
				'puesto' => '1',
				'fecha_nacimiento' => $faker->date(),
				'peso' => 70,
				'altura' => 1.80,
				'detalles' => $faker->text(200)
			]);
		}

		// Seed defensas
		foreach (range(1, 6) as $index) {
			Integrante::create([
				'equipo_id' => 1,
				'nombre' => $faker->name,
				'nombre_imagen' => 'player.jpeg',
				'es_tecnico' => 0
			]);

			$integrante = Integrante::all();
			$integrante = $integrante->last();

			Ficha::create([
				'integrante_id' => $integrante->id,
				'puesto' => '2',
				'fecha_nacimiento' => $faker->date(),
				'peso' => 70,
				'altura' => 1.80,
				'detalles' => $faker->text(200)
			]);
		}

		// Seed centros
		foreach (range(1, 8) as $index) {
			Integrante::create([
				'equipo_id' => 1,
				'nombre' => $faker->name,
				'nombre_imagen' => 'player.jpeg',
				'es_tecnico' => 0
			]);

			$integrante = Integrante::all();
			$integrante = $integrante->last();

			Ficha::create([
				'integrante_id' => $integrante->id,
				'puesto' => '3',
				'fecha_nacimiento' => $faker->date(),
				'peso' => 70,
				'altura' => 1.80,
				'detalles' => $faker->text(200)
			]);
		}

		// Seed delanteros
		foreach (range(1, 2) as $index) {
			Integrante::create([
				'equipo_id' => 1,
				'nombre' => $faker->name,
				'nombre_imagen' => 'player.jpeg',
				'es_tecnico' => 0
			]);

			$integrante = Integrante::all();
			$integrante = $integrante->last();

			Ficha::create([
				'integrante_id' => $integrante->id,
				'puesto' => '4',
				'fecha_nacimiento' => $faker->date(),
				'peso' => 70,
				'altura' => 1.80,
				'detalles' => $faker->text(200)
			]);
		}
	}
}