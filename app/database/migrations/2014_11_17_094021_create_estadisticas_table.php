<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadisticasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estadisticas', function($table){
			//$table->integer('id')->unsigned();
			$table->increments('id');
			$table->integer('equipo_id')->unsigned();
			$table->tinyInteger('puntos');
			$table->tinyInteger('partidos_ganados');
			$table->tinyInteger('partidos_empatados');
			$table->tinyInteger('partidos_perdidos');
			$table->tinyInteger('goles_a_favor');
			$table->tinyInteger('goles_en_contra');
			$table->tinyInteger('tarjetas_amarillas')->nullable();
			$table->tinyInteger('tarjetas_rojas')->nullable();
			$table->timestamps();
		});
		
		// Incrementa el valor del campo ID en 1 por cada inserción realizada
		// DB::unprepared('CREATE TRIGGER incrementarID BEFORE INSERT ON estadisticas 
		// FOR EACH ROW 
		// 	BEGIN
		// 		select count(*) into @filas from estadisticas;
		// 		select id + 1 into @nuevoID from estadisticas order by id desc limit 1;
		// 	IF @filas > 0 then
		// 		set NEW.id = @nuevoID;
		// 	ELSE
		// 		set NEW.id = 1;
		// 	END IF;
		// END
		// ');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estadisticas');
	}

}
