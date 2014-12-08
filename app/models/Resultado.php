<?php

class Resultado extends Eloquent{
	protected $table = "resultados";

	public function jornada(){
		return $this->belongsTo("Jornada");
	}
}