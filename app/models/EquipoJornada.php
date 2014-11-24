<?php

class EquipoJornada extends Eloquent{
	protected $table = "equipo_jornada";

	public function jornada(){
		return $this->belongsTo('Jornada');
	}

	public function equipoLocal(){
		return $this->belongsTo("Equipo", "equipo_local");
	}

	public function equipoVisitante(){
		return $this->belongsTo("Equipo", "equipo_visitante");
	}
}