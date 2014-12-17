<?php

class Trofeo extends Eloquent{
	protected $table = "trofeos";

	protected $fillable = array("nombre", "ganado_por", "temporada_id", "nombre_imagen");

	public function temporada(){
		return $this->belongsTo("Temporada");
	}
}