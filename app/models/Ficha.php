<?php

class Ficha extends Eloquent{
	protected $table = "fichas";

	public function integrante(){
		return $this->belongsTo("Integrante");
	}
}