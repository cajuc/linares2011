<?php

class Estadistica extends Eloquent{
	protected $table = "estadisticas";
	
	public function equipo(){
		return $this->belongsTo("Equipo");
	}
}