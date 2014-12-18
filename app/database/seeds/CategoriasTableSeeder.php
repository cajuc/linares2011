<?php

class CategoriasTableSeeder extends Seeder{
	public function run(){
		$categorias = array("senior", "juvenil", "cadete", "infantil", "alevín");

		foreach (range(0, 4) as $index) {
			Categoria::create([
				'nombre' => $categorias[$index]
			]);
		}
	}
}