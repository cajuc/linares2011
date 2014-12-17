<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegrantesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('integrantes', function($table){
			$table->increments('id');
			$table->integer('equipo_id')->unsigned()->nullable();
			$table->string('nombre', 45);
			$table->string('apellidos', 60);
			$table->string('alias', 45);
			$table->string('nombre_imagen', 30)->nullable();
			$table->boolean('es_tecnico');
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
		Schema::drop('integrantes');
	}

}
