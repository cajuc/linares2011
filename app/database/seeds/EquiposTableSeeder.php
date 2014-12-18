<?php

class EquiposTableSeeder extends Seeder{
	public function run(){
		$propios = array("Juvenil A", "Juvenil B", "Cadete A", "Cadete B", "Infantil A", "Infantil B", "Alevín A");
		$categoria = array(2,2,3,3,4,4,5);
		$rivales = array("Arroyo del Ojanco", "Arquillos", "Linares B", "Ibros", "Begíjar", "Villanueva", "Sabiote", "Tugia", "Villacarrillo", "Orcera", "Santiesteban", "Pozo Alcón", "Sierra Segura");

		Equipo::create([
			'categoria_id' => 1,
			'nombre' => "Senior",
			'slug' => "equipo-senior",
			'liga_id' => 1,
			'club_id' => 1
		]);

		foreach (range(0, 12) as $index) {
			Equipo::create([
				'categoria_id' => 1,
				'nombre' => $rivales[$index],
				'slug' => "equipo-".$rivales[$index],
				'liga_id' => 1
			]);
		}

		foreach (range(0, 6) as $index) {
			Equipo::create([
				'categoria_id' => $categoria[$index],
				'nombre' => $propios[$index],
				'slug' => "equipo-".$propios[$index],
				'club_id' => 1
			]);
		}
	}
}