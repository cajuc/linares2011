<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJornadasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jornadas', function($table){
			$table->increments('id');
			$table->integer('n_jornada')->unsigned();
			$table->integer('equipo_local')->unsigned();
			$table->integer('equipo_visitante')->unsigned();
			$table->tinyInteger('goles_local')->unsigned();
			$table->tinyInteger('goles_visitante')->unsigned();
			$table->integer('temporada_id')->unsigned();
			$table->date('fecha_disputada');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jornadas');
	}

}
