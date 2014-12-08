<?php

class Club extends Eloquent{
	protected $table = "clubs";

	public function equipos(){
		return $this->hasMany("Equipo");
	}
}