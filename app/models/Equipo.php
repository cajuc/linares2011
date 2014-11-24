<?php

class Equipo extends Eloquent {
	protected $table = "equipos";

	public function estadisticas(){
		return $this->hasMany("Estadistica");
	}

	public function equiposJornadasLocal(){
		return $this->hasMany("EquipoJornada", "equipo_local");
	}

	public function equiposJornadasVisitante(){
		return $this->hasMany("EquipoJornada", "equipo_visitante");
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