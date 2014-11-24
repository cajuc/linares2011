<?php

class Equipo extends Eloquent {
	protected $table = "equipos";

	public function estadisticas(){
		return $this->hasMany("Estadistica");
	}

	public function jornadas_local(){
		return $this->hasMany("Jornada", "equipo_local_id");
	}

	public function jornadas_visitante(){
		ruturn $this->hasMany("Jornada", "equipo_visitante_id");
	}

	public function integrantes(){
		return $this->hasMany("Integrante");
	}

	public function categoria(){
		return $this->belongsTo("Categoria");
	}

	public function liga(){
		return $this->belongsTo("Liga");
	}
}