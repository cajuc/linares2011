<?php

class Integrante extends Eloquent{
	protected $table = "integrantes";

	protected $fillable = array("equipo_id", "nombre", "nombre_imagen", "es_tecnico", "alias", "apellidos");

	public function ficha(){
		return $this->hasOne("Ficha");
	}

	public function equipo(){
		return $this->belongsTo("Equipo");
	}
}