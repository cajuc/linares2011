<?php

class Club extends Eloquent{
	protected $table = "clubs";

	protected $fillable = array("nombre");

	public function equipos(){
		return $this->hasMany("Equipo");
	}
}