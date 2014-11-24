<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipoJornadaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('equipo_jornada', function($table){
			$table->increments('id');
			$table->integer('jornada_id')->unsigned();
			$table->integer('equipo_local')->unsigned();
			$table->integer('equipo_visitante')->unsigned();
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
		Schema::drop('equipo_jornada');
	}

}
