<?php

class Liga extends Eloquent{
	protected $table = "ligas";

	public function jornadas(){
		return $this->hasMany("Jornada");
	}

	public function equipos(){
		return $this->hasMany("Equipo");
	}

	public function temporadas(){
		return $this->belongsToMany("Temporada");
	}
}