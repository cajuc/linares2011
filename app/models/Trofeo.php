<?php

class Trofeo extends Eloquent{
	protected $table = "trofeos";

	public function temporada(){
		return $this->belongsTo("Temporada");
	}
}