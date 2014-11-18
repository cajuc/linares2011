<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fichas', function($table){
			$table->increments('id');
			$table->integer('integrante_id')->unsigned();
			$table->tinyInteger('peso')->nullable();
			$table->string('posicion', 30);
			$table->date('fecha_nacimiento');
			$table->decimal('altura', 3, 2)->nullable();
			$table->string('detalles', 255)->nullable();
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
		Schema::drop('fichas');
	}

}
