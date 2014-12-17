<?php

class TrofeosController extends BaseController{
	public function displayTrophys($page = 1){
		$perpage = 5;

		$trofeos = Trofeo::take($perpage)->skip(($page - 1) * $perpage)->get();
		$totalitems = Trofeo::all()->count();

		Paginator::setBaseUrl('http://linares2011/trofeos');
		Paginator::setCurrentPage($page);

		$paginator = PrettyPaginator::make($trofeos->toArray(), $totalitems, $perpage);

		return View::make('trofeos')->with([
			'itemActive' => 'trofeos',
			'trofeos' => $trofeos,
			'paginator' => $paginator
		]);
	}
}