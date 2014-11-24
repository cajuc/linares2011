<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignsEquipojornada extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('equipo_jornada', function($table){
			$table->foreign('jornada_id')->references('id')->on('jornadas');
			$table->foreign('equipo_local')->references('id')->on('equipos');
			$table->foreign('equipo_visitante')->references('id')->on('equipos');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Borrar foreigns de la tabla equipo_jornada
		Schema::table('equipo_jornada', function($table){
			$table->dropForeign('equipo_jornada_jornada_id_foreign');
			$table->dropForeign('equipo_jornada_equipo_local_foreign');
			$table->dropForeign('equipo_jornada_equipo_visitante_foreign');
		});
	}

}
