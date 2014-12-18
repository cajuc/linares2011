<?php

class EstadisticasTableSeeder extends Seeder{
	public function run(){
		foreach (range(1, 14) as $index) {
			Estadistica::create([
				'equipo_id' => $index,
				'puntos' => rand(20, 50),
				'partidos_ganados' => rand(5, 10),
				'partidos_empatados' => rand(2, 6),
				'partidos_perdidos' => rand(0, 5),
				'goles_a_favor' => rand(15, 40),
				'goles_en_contra' => rand(14, 45)
			]);
		}
	}
}