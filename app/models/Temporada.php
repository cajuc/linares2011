<?php

class Temporada extends Eloquent{
	protected $table = "temporadas";

	public function multimedias(){
		return $this->hasMany("Multimedia");
	}

	public function trofeos(){
		return $this->hasMany("Trofeo");
	}

	public function ligas(){
		return $this->belongsToMany("Liga");
	}
}