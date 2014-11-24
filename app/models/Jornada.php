<?php

class Jornada extends Eloquent{
	protected $table = "jornadas";

	public function resultados(){
		return $this->hasMany("Resultado");
	}

	public function equiposJornadas(){
		return $this->hasMany("EquipoJornada");
	}

	public function liga(){
		return $this->belongsTo("Liga");
	}
}