<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sliders', function($table){
			$table->increments('id');
			$table->string('nombre_imagen', 45);
			$table->enum('orden', array('1', '2', '3', '4', '5'))->nullable();
			$table->string('titulo', 60);
			$table->text('descripcion')->nullable();
			$table->tinyInteger('publicar');
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
		Schema::drop('sliders');
	}

}
