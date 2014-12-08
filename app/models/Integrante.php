<?php

class Integrante extends Eloquent{
	protected $table = "integrantes";

	public function ficha(){
		return $this->hasOne("Ficha");
	}

	public function equipo(){
		return $this->belongsTo("Equipo");
	}
}