<?php

class Slider extends Eloquent{
	protected $table = "sliders";

	// Permitir escritura sobre los campos especificados
	protected $fillable = array("nombre_imagen", "publicar", "orden", "titulo", "descripcion");
}