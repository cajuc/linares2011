<?php

class TrofeosController extends BaseController{
	// public function getIndex(){
	// 	$trofeos = ObtenerRecursos::obtenerTrofeos(1);

	// 	return View::make('trofeos')->with([
	// 		'itemActive' => 'trofeos',
	// 		'trofeos' => $trofeos
	// 	]);
	// }

	public function displayTrophys($page = 1){
		// Obtengo todas las temporadas para rellenar el dropdown
		// $temporadas = ObtenerRecursos::obtenerTemporadas();
		// dd($temporadas[0]);die();
		$perpage = 5;

		// if(isset($_POST['temporada']) || Session::has('selected')){
		// 	if (Session::has('selected') && !isset($_POST['temporada'])) {
		// 		$temporada_id = Session::get('selected');
		// 	}else{	
		// 		$temporada_id = Input::get('temporada');
		// 	}

		// 	$trofeos = Trofeo::whereTemporada_id($temporada_id)->take($perpage)->skip(($page - 1) * $perpage)->get();
		// 	$totalitems = Trofeo::whereTemporada_id($temporada_id)->get();
		// 	$totalitems = count($totalitems->toArray());

		// 	if (!$totalitems) {
		// 		Session::flash('not-found', '!!No hay trofeos para la temporada seleccionada');
		// 	}

		// 	Session::set('selected', $temporada_id);
		// }else{
		$trofeos = Trofeo::take($perpage)->skip(($page - 1) * $perpage)->get();
		$totalitems = Trofeo::all()->count();
		// }

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