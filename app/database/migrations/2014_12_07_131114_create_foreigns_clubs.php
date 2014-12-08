<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignsClubs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('equipos', function($table){
			$table->foreign('club_id')->references('id')->on('clubs')->onDelete('restrict')->onUpdate('cascade');
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
		Schema::table('equipos', function($table){
			$table->dropForeign('equipos_club_id_foreign');
		});
	}

}
