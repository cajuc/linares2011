<?php

class Multimedia extends Eloquent{
	protected $table = "multimedias";

	public function categoria(){
		return $this->belongsTo("Categoria");
	}

	public function temporada(){
		return $this->belongsTo("Temporada");
	}
}