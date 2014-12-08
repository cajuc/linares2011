<?php

class CategoriaController extends BaseController{
	public function showTemplate($categoria){
		return View::make('categoria')->with(array(
			'categoria' => $categoria,
			'itemActive' => 'categoria'
		));
	}
}