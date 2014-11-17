<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrofeosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trofeos', function($table){
			$table->increments('id');
			$table->string('nombre', 45);
			$table->integer('temporada_id')->unsigned();
			$table->string('ganado_por', 45);
			$table->string('nombre_imagen', 30);
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
		Schema::drop('trofeos');
	}

}
