<?php
class ObtenerRecursos extends BaseController{
	
	// Función para obtener el nombre del club
	public static function obtenerClub(){
		$club = Club::first();

		return $club;
	}

	// Función para obtener todas las categorías
	public static function obtenerCategorias(){
		$categorias = Categoria::all();

		foreach ($categorias as $categoria) {
			foreach ($categoria->equipos as $key => $equipo) {
				if (!$equipo->club) {
					unset($categoria->equipos[$key]);
				}
			}
		}

		return $categorias;
	}

	// Función para obtener los datos para 'Clasificación'
	public static function obtenerDatosClasificacion($categoria){
		$liga = DB::table('equipos')->join('categorias', 'equipos.categoria_id', '=', 'categorias.id')
						->join('clubs', 'equipos.club_id', '=', 'clubs.id')
						->where('categorias.nombre', '=', $categoria)
						->select('liga_id')->get();

		if ($liga){
			$liga = DB::table('ligas')->join('equipos', 'ligas.id', '=', 'equipos.liga_id')
						->join('estadisticas', 'equipos.id', '=', 'estadisticas.equipo_id')
						->leftJoin('clubs', 'equipos.club_id', '=', 'clubs.id')
						->where('ligas.id', '=', $liga[0]->liga_id)
						->orderBy('estadisticas.puntos', 'Desc')
						->select('estadisticas.*', 'equipos.*', 'ligas.nombre as liga', 'clubs.nombre as club')->get();
		}else{
			$liga = null;
		}

		return $liga;
	}

	// Función para obtener los integrantes del equipo seleccionado
	public static function obtenerIntegrantes($equipo){
		$equipo = Equipo::whereSlug($equipo)->get()->first();

		if (!$equipo) {
			return false;
		}

		$integrantes = $equipo->integrantes;

		return $integrantes;
	}

	// Función para obtener los jugadores del equipo seleccionado
	public static function obtenerJugadores($integrantes){
		$jugadores = array();

		foreach ($integrantes as $key => $integrante) {
			if (!$integrante->es_tecnico) {
				$jugadores[] = $integrante;
			}
		}

		return $jugadores;
	}

	// Función para obtener los técnicos del equipo seleccionado
	public static function obtenerTecnicos($integrantes){
		$tecnicos = array();

		foreach ($integrantes as $key => $integrante) {
			if ($integrante->es_tecnico) {
				$tecnicos[] = $integrante;
			}
		}

		return $tecnicos;
	}

	// Función para obtener la categoria del equipo seleccionado
	public static function obtenerCategoria($equipo){
		$categoria = Equipo::whereSlug($equipo)->get()->first()->categoria->nombre;

		return $categoria;
	}

	public static function obtenerTemporadas(){
		$temporadas = Temporada::orderBy('periodo', 'Desc')->get();

		return $temporadas;
	}

	public static function obtenerSliderImages(){
		$slider_images = Slider::orderBy('publicar', 'Desc')->orderBy('updated_at', 'Desc')->get();

		return $slider_images;
	}

	public static function subirImage($image, $trophy = null){
		$exist2 = false;
		$comprobar = true;

		if ($trophy) {
			$exist2 = file_exists('assets/images/trophys/'.$image->getClientOriginalName());
			$comprobar = false;
		}else{
			$exist = Slider::where('nombre_imagen', '=', $image->getClientOriginalName())->get();
		}

		if ($exist2) {
			return ['success' => false, 'image' => $image->getClientOriginalName()];
		}elseif($comprobar){
			if (!empty($exist->toArray())) {
				return ['success' => false, 'image' => $image->getClientOriginalName()];
			}else{
				Slider::create([
					'nombre_imagen' => $image->getClientOriginalName(),
					'usar' => 0,
					'titulo' => ''
				]);
			}
		}

		return ['success' => true, 'image' => $image->getClientOriginalName()];
	}

	// Función para obtener las images de slider publicadas
	public static function obtenerSliderImagesPublished($id = null){
		$exist = false;

		if ($id) {
			$exist = Slider::find($id);

			if ($exist->publicar) {
				$exist = true;
			}else{
				$exist = false;
			}
		}

		$slider_images = Slider::wherePublicar(1)->orderBy('orden')->orderBy('updated_at', 'Desc')->get();

		return array('slider_images' => $slider_images, 'exist' => $exist);
	}

	// Función para obtener los equipos que pertenecen al club
	public static function obtenerEquiposClub(){
		$club_id = Club::first();
		$teams = Equipo::whereClub_id($club_id->id)->get();

		return $teams;
	}

	// Función para obtener todas las ligas
	public static function obtenerLigas(){
		$ligas = Liga::all();

		return $ligas;
	}

	// Función para comprobar que solo haya un equipo de la misma categoría en la misma liga
	public static function validarEquipoLiga($liga, $club, $id){
		if ($liga != 'null') {
			$equipo = Equipo::whereClub_id($club)->whereLiga_id($liga)->first();
			
			if ($equipo) {
				if ($equipo->id != $id || !$id) {
					return ["success" => false];
				}
			}
		}


		return ["success" => true];
	}

	// Función para obtener todos los trofeos
	public static function obtenerTrofeos(){
		$trophys = Trofeo::all();

		return $trophys;
	}
}