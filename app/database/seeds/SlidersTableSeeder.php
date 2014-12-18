<?php

class SlidersTableSeeder extends Seeder{
	public function run(){
		$sliders = array("slider-1.jpg", "slider-2.jpg", "slider-3.jpg");
		$titulos = array("Imagen 1", "Imagen 2", "Imagen 3");

		foreach (range(0, 2) as $index) {
			Slider::create([
				'orden' => $index+1,
				'nombre_imagen' => $sliders[$index],
				'publicar' => 1,
				'titulo' => $titulos[$index]
			]);
		}
	}
}