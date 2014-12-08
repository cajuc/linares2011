<?php

class Integrante extends Eloquent{
	protected $table = "integrantes";

	public function fichas(){
		return $this->hasMany("Ficha");
	}

	public function equipo(){
		return $this->belongsTo("Equipo");
	}
}