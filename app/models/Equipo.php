<?php

class Equipo extends Eloquent {
	protected $table = "equipos";

	protected $fillable = array("nombre", "categoria_id", "liga_id", "slug", "club_id");

	public function estadistica(){
		return $this->hasOne("Estadistica");
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

	public function club(){
		return $this->belongsTo("Club");
	}

	public function categoria(){
		return $this->belongsTo("Categoria");
	}

	public function liga(){
		return $this->belongsTo("Liga");
	}
}