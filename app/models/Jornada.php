<?php

class Jornada extends Eloquent{
	protected $table = "jornadas";

	public function resultados(){
		return $this->hasMany("Resultado");
	}

	public function equipo_local(){
		return $this->belongsTo("Equipo", "equipo_local_id");
	}

	public function equipo_visitante(){
		return $this->belongsTo("Equipo", "equipo_visitante_id");
	}

	public function liga(){
		return $this->belongsTo("Liga");
	}
}