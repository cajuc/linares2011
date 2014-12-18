<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('ClubsTableSeeder');
		$this->call('TemporadasTableSeeder');
		$this->call('LigasTableSeeder');
		$this->call('TrofeosTableSeeder');
		$this->call('CategoriasTableSeeder');
		$this->call('EquiposTableSeeder');
		$this->call('IntegrantesTableSeeder');
		$this->call('EstadisticasTableSeeder');
		$this->call('SlidersTableSeeder');
	}

}
