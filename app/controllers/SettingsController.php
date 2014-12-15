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

		return View::make('settings')->with([
			'slider_images' => $slider_images,
			'itemActive' => 'settings'
		]);
	}

	public function postUploadImage(){
		$files = Input::file('image');
		$doneUpload = null;
		$failUpload = null;


		// var_dump($file);

		// Mensajes personalizados
		$messages = array(
			'required' => 'Debes seleccionar una imagen',
			'image' => 'Los archivos deben ser de tipo imagen',
			'mimes' => 'El tipo de imagen debe ser jpeg, png'
		);
		
		foreach ($files as $key => $file) {
			$validator = Validator::make(
				['image' => $file], 
				array('image' => 'required|image|mimes:jpeg,png'),
				$messages
			);

			if ($validator->fails()) {
				return Response::json(['success' => false, 'errors' => $validator->errors()->toArray()]);
			}
		}

		foreach ($files as $key => $file) {
			// Añadir imagen en la base de datos
			$results = ObtenerRecursos::subirSliderImage($file);

			// var_dump($results);die();

			if (!$results['success']) {
				$failUpload[] = $results['image'];
			}else{
				$move = $file->move('assets/images/slider', $file->getClientOriginalName());
				$doneUpload[] = $results['image']; 
			}
		}

		return Response::json(['success' => true, 'failUpload' => $failUpload, 'doneUpload' => $doneUpload]);
	}
}