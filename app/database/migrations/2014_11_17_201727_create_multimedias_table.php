<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultimediasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('multimedias', function($table){
			$table->increments('id');
			$table->string('nombre_foto', 30)->nullable();
			$table->string('nombre_video', 30)->nullable();
			$table->date('fecha_publicacion');
			$table->string('titulo', 45);
			$table->integer('temporada_id')->unsigned();
			$table->integer('categoria_id')->unsigned();
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
		Schema::drop('multimedias');
	}

}
