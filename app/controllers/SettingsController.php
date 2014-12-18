<?php

class SettingsController extends BaseController{
	public function __construct(){
		$this->beforeFilter(function(){
			if (!Auth::check()) {
				return Redirect::to('/');
			}
		});
	}	

	public function getIndex(){
		$slider_images = ObtenerRecursos::obtenerSliderImages();
		$categories = ObtenerRecursos::obtenerCategorias();
		$club = ObtenerRecursos::obtenerClub();
		$teams = ObtenerRecursos::obtenerEquiposClub();
		$ligas = ObtenerRecursos::obtenerLigas();
		$trofeos = ObtenerRecursos::obtenerTrofeos();
		$temporadas = ObtenerRecursos::obtenerTemporadas();

		return View::make('settings')->with([
			'slider_images' => $slider_images,
			'categories' => $categories,
			'club' => $club,
			'teams' => $teams,
			'ligas' => $ligas,
			'trophys' => $trofeos,
			'temporadas' => $temporadas,
			'itemActive' => 'settings'
		]);
	}

	// Función para realizar añadir imagenes del slider
	public function postUploadImage(){
		$files = Input::file('image');
		$doneUpload = null;
		$failUpload = null;

		// Mensajes personalizados
		$messages = array(
			'required' => 'Debes seleccionar una imagen',
			'image' => 'Los archivos deben ser de tipo imagen',
			'mimes' => 'El tipo de imagen debe ser jpeg, png'
		);
		
		foreach ($files as $key => $file) {
			$validator = Validator::make(
				['image' => $file], 
				array('image' => 'required|image|mimes:jpeg,png,gif'),
				$messages
			);

			if ($validator->fails()) {
				return Response::json(['success' => false, 'errors' => $validator->errors()->toArray()]);
			}
		}

		foreach ($files as $key => $file) {
			// Añadir imagen en la base de datos
			if (Input::get('trophy-hidden')) {
				$results = ObtenerRecursos::subirImage($file, true);
			}else{
				$results = ObtenerRecursos::subirImage($file);
			}

			if (!$results['success']) {
				$failUpload[] = $results['image'];
			}else{
				if(Input::get('trophy-hidden')){
					$move = $file->move('assets/images/trophys', $file->getClientOriginalName());
				}else{
					$move = $file->move('assets/images/slider', $file->getClientOriginalName());
				}
				$doneUpload[] = $results['image']; 
			}
		}

		return Response::json(['success' => true, 'failUpload' => $failUpload, 'doneUpload' => $doneUpload]);
	}

	// Función para actualizar una imagen del slider
	public function postUpdateSliderImage(){
		// Comprobar que se desea hacer una publicación
		if (Input::get('publicar')) {
			$data = ObtenerRecursos::obtenerSliderImagesPublished(Input::get('id'));

			if (count($data['slider_images']->toArray()) == 5 && !$data['exist']) {
				return Response::json(['success' => false, 'file' => Input::get('file'), 'limits' => true]);
			}

		}

		$slider_image = Slider::find(Input::get('id'));
		$slider_image->orden = Input::get('orden');
		$slider_image->publicar = Input::get('publicar');
		$slider_image->titulo = Input::get('titulo');
		$slider_image->descripcion = Input::get('descripcion');
		$slider_image->updated_at = date("Y-m-d H:i:s", time());
		$saved = $slider_image->save();

		if (!$saved) {
			return Response::json(['success' => false, 'file' => Input::get('file'), 'limits' => false]);
		}

		return Response::json(['success' => true, 'file' => Input::get('file'), 'limits' => false]);
	}

	// Función para realizar el borrar imagenes del slider
	public function postDeleteSliderImage(){
		$slider_image = Slider::find(Input::get('id'));
		$delete_row = $slider_image->delete();
		$delete_file = File::delete('assets/images/slider/'.Input::get('file'));

		if (!$delete_row && !$delete_file) {
			return Response::json(['success' => false, 'file' => Input::get('file')]);
		}

		return Response::json(['success' => true, 'file' => Input::get('file')]);
	}

	// Función para realizar la actualización del club
	public function postUpdateClub(){
		$club = Club::find(Input::get('id'));

		$club->nombre = Input::get('club');
		$saved = $club->save();

		if(!$saved){
			return Response::json(['success' => false, 'club' => Input::get('club')]);
		}

		return Response::json(['success' => true, 'club' => Input::get('club')]);
	}

	// Función para borrar un club
	public function postDeleteClub(){
		$club = Club::find(Input::get('id'));
		$hasTeams = $club->equipos()->get();

		if (count($hasTeams->toArray())) {
			return Response::json(['success' => false, 'club' => Input::get('club')]);
		}

		$category->delete();

		return Response::json(['success' => true, 'club' => Input::get('club')]);
	}

	// Función para añadir un club
	public function postAddClub(){
		$club = Club::first();

		if(count($club->toArray())){
			return Response::json(['success' => false]);
		}
		
		Club::create([
			'nombre' => Input::get('club')
		]);

		return Response::json(['success' => true, 'club' => Input::get('club')]);
	}

	// Función para borrar las categorías
	public function postDeleteCategory(){
		$category = Categoria::find(Input::get('id'));
		$hasTeams = $category->equipos()->get();

		if (count($hasTeams->toArray())) {
			return Response::json(['success' => false, 'category' => Input::get('category')]);
		}

		$category->delete();

		return Response::json(['success' => true, 'category' => Input::get('category')]);
	}
	
	// Función para añadir categorías
	public function postAddCategory(){
		$category = Categoria::whereNombre(Input::get('category'))->get();

		if(count($category->toArray())){
			return Response::json(['success' => false, 'category' => Input::get('category')]);
		}
		
		Categoria::create([
			'nombre' => Input::get('category')
		]);

		return Response::json(['success' => true, 'category' => Input::get('category')]);
	}

	// Función para realizar la actualización de un equipo
	public function postUpdateTeam(){
		$team = Equipo::whereSlug(Input::get('slug'))->orWhere('nombre', '=', Input::get('team'))->first();
		$valido = ObtenerRecursos::validarEquipoLiga(Input::get('liga'), Input::get('club'), Input::get('id'));

		if (!$valido["success"] || ($team && Input::get('id') != $team->id)) {
			return Response::json(['success' => false, 'team' => Input::get('team')]);
		}

		$equipo = Equipo::find(Input::get('id'));
		$equipo->nombre = trim(Input::get('team'));
		$equipo->slug = trim(Input::get('slug'));
		$equipo->categoria_id = Input::get('category');

		if (Input::get('liga') == 'null') {
			$equipo->liga_id = null;
		}else{
			$equipo->liga_id = Input::get('liga');
		}
		
		$saved = $equipo->save();

		if(!$saved){
			return Response::json(['success' => false, 'team' => Input::get('team')]);
		}

		return Response::json(['success' => true, 'team' => Input::get('team')]);
	}

	// Función para borrar las categorías
	public function postDeleteTeam(){
		$team = Equipo::find(Input::get('id'));
		$hasMembers = $team->integrantes()->get();

		if (count($hasMembers->toArray())) {
			return Response::json(['success' => false, 'team' => Input::get('team')]);
		}

		$team->delete();

		return Response::json(['success' => true, 'team' => Input::get('team')]);
	}

	// Función para añadir categorías
	public function postAddTeam(){
		$team = Equipo::whereSlug(Input::get('slug'))->orWhere('nombre', '=', Input::get('team'))->first();
		$valido = ObtenerRecursos::validarEquipoLiga(Input::get('liga'), Input::get('club'), false);

		if (!$valido["success"] || ($team && Input::get('id') != $team->id)) {
			return Response::json(['success' => false, 'team' => Input::get('team')]);
		}


		if (Input::get('liga') == 'null') {
			$liga = null;
		}else{
			$liga = Input::get('liga');
		}
		
		Equipo::create([
			'nombre' => trim(Input::get('team')),
			'slug' => trim(Input::get('slug')),
			'categoria_id' => Input::get('category'),
			'liga_id' => $liga,
			'club_id' => Input::get('club')
		]);

		return Response::json(['success' => true, 'team' => Input::get('team')]);
	}

	// Función para realizar la actualización de un trofeo
	public function postUpdateTrophy(){
		$trophy = Trofeo::find(Input::get('id'));
		$trophy->nombre = trim(Input::get('trophy'));
		$trophy->ganado_por = trim(Input::get('ganado_por'));
		$trophy->temporada_id = Input::get('temporada');
		$trophy->nombre_imagen = Input::get('imagen');
		$saved = $trophy->save();

		if(!$saved){
			return Response::json(['success' => false, 'trophy' => Input::get('trophy')]);
		}

		return Response::json(['success' => true, 'trophy' => Input::get('trophy')]);
	}

	// Función para borrar los trofeos
	public function postDeleteTrophy(){
		$trophy = Trofeo::find(Input::get('id'));

		$deleted = $trophy->delete();

		if (!$deleted) {
			return Response::json(['success' => false, 'trophy' => Input::get('trophy')]);
		}

		return Response::json(['success' => true, 'trophy' => Input::get('trophy')]);
	}

	// Función para añadir categorías
	public function postAddTrophy(){
		// $team = Equipo::whereSlug(Input::get('slug'))->orWhere('nombre', '=', Input::get('team'))->first();
		// $valido = ObtenerRecursos::validarEquipoLiga(Input::get('liga'), Input::get('club'), false);

		// if (!$valido["success"] || ($team && Input::get('id') != $team->id)) {
		// 	return Response::json(['success' => false, 'team' => Input::get('team')]);
		// }


		// if (Input::get('liga') == 'null') {
		// 	$liga = null;
		// }else{
		// 	$liga = Input::get('liga');
		// }
		
		Trofeo::create([
			'nombre' => trim(Input::get('trophy')),
			'ganado_por' => trim(Input::get('ganado_por')),
			'temporada_id' => Input::get('temporada'),
			'nombre_imagen' => Input::get('imagen')
		]);

		return Response::json(['success' => true, 'trophy' => Input::get('trophy')]);
	}
}