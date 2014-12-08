<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignsResultados extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('resultados', function($table){
			$table->foreign('jornada_id')->references('id')->on('jornadas')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Borrar foreigns de la tabla resultados
		Schema::table('resultados', function($table){
			$table->dropForeign('resultados_jornada_id_foreign');
		});
	}

}
