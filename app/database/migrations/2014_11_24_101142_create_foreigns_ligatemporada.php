<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignsLigatemporada extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('liga_temporada', function($table){
			$table->foreign('liga_id')->references('id')->on('ligas');
			$table->foreign('temporada_id')->references('id')->on('temporadas');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Borrar foreigns de la tabla liga_temporada
		Schema::table('liga_temporada', function($table){
			$table->dropForeign('liga_temporada_liga_id_foreign');
			$table->dropForeign('liga_temporada_temporada_id_foreign');
		});
	}

}
