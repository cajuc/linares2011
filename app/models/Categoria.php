<?php

class Categoria extends Eloquent {
	protected $table = "categorias";

	public function equipos(){
		return $this->hasMany("Equipo");
	}

	public function multimedias(){
		return $this->hasMany("Multimedia");
	}
}