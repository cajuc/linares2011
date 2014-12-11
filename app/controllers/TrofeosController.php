<?php

class TrofeosController extends BaseController{
	public function getIndex(){
		return View::make('trofeos')->with([
			'itemActive' => 'trofeos'
		]);
	}
}