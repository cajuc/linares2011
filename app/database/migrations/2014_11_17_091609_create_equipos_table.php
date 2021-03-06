<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiposTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('equipos', function($table){
			$table->increments('id');
			$table->integer('categoria_id')->unsigned();
			$table->string('nombre', 45)->unique();
			$table->string('slug', 45)->unique();
			$table->integer('liga_id')->unsigned()->nullable();
			$table->integer('club_id')->unsigned()->nullable();
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
		Schema::drop('equipos');
	}

}
