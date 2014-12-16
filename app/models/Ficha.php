<?php

class Ficha extends Eloquent{
	protected $table = "fichas";

	protected $fillable = array("integrante_id", "peso", "posicion_especifica", "puesto", "fecha_nacimiento", "altura", "detalles");

	public function integrante(){
		return $this->belongsTo("Integrante");
	}
}