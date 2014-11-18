<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeigns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('equipos', function($table){
			$table->foreign('categoria_id')->references('id')->on('categorias');
			$table->foreign('liga_id')->references('id')->on('ligas');
			$table->foreign('jornada_id')->references('id')->on('jornadas');
		});

		Schema::table('estadisticas', function($table){
			$table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade')->onUpdate('cascade');
		});

		Schema::table('integrantes', function($table){
			$table->foreign('equipo_id')->references('id')->on('equipos');
		});

		Schema::table('fichas', function($table){
			$table->foreign('integrante_id')->references('id')->on('integrantes')->onDelete('cascade')->onUpdate('cascade');
		});

		Schema::table('multimedias', function($table){
			$table->foreign('temporada_id')->references('id')->on('temporadas');
			$table->foreign('categoria_id')->references('id')->on('categorias');
		});

		Schema::table('trofeos', function($table){
			$table->foreign('temporada_id')->references('id')->on('temporadas');
		});

		Schema::table('ligas', function($table){
			$table->foreign('temporada_id')->references('id')->on('temporadas');
		});

		Schema::table('jornadas', function($table){
			$table->foreign('equipo_local')->references('id')->on('equipos');
			$table->foreign('equipo_visitante')->references('id')->on('equipos');
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
		// Borrar foreigns de la tabla equipos
		Schema::table('equipos', function($table){
			$table->dropForeign('equipos_categoria_id_foreign');
			$table->dropForeign('equipos_liga_id_foreign');
			$table->dropForeign('equipos_jornada_id_foreign');
		});

		// Borrar foreigns de la tabla estadisticas
		Schema::table('estadisticas', function($table){
			$table->dropForeign('estadisticas_equipo_id_foreign');
		});

		// Borrar foreigns de la tabla integrantes
		Schema::table('integrantes', function($table){
			$table->dropForeign('integrantes_equipo_id_foreign');
		});

		// Borrar foreigns de la tabla fichas
		Schema::table('fichas', function($table){
			$table->dropForeign('fichas_integrante_id_foreign');
		});

		// Borrar foreigns de la tabla multimedias
		Schema::table('multimedias', function($table){
			$table->dropForeign('multimedias_temporada_id_foreign');
			$table->dropForeign('multimedias_categoria_id_foreign');
		});

		// Borrar foreigns de la tabla trofeos
		Schema::table('trofeos', function($table){
			$table->dropForeign('trofeos_temporada_id_foreign');
		});

		// Borrar foreigns de la tabla ligas
		Schema::table('ligas', function($table){
			$table->dropForeign('ligas_temporada_id_foreign');
		});

		// Borrar foreigns de la tabla jornadas
		Schema::table('jornadas', function($table){
			$table->dropForeign('jornadas_equipo_local_foreign');
			$table->dropForeign('jornadas_equipo_visitante_foreign');
			$table->dropForeign('jornadas_temporada_id_foreign');
		});
	}

}
