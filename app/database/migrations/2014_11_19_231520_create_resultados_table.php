<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resultados', function($table){
			$table->increments('id');
			$table->integer('jornada_id')->unsigned();
			$table->tinyInteger('goles_local')->unsigned();
			$table->tinyInteger('goles_visitante')->unsigned();
			$table->date('fecha_disputada');
			$table->string('estadio', 45)->nullable();
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
		Schema::drop('resultados');
	}

}
