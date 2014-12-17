<?php

class Categoria extends Eloquent {
	protected $table = "categorias";

	protected $fillable = array("nombre");

	public function equipos(){
		return $this->hasMany("Equipo");
	}

	public function multimedias(){
		return $this->hasMany("Multimedia");
	}
}