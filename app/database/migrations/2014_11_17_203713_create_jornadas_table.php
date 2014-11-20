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
			$table->integer('liga_id')->unsigned();
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
