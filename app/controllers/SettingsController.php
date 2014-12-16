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

			if (!$results['success']) {
				$failUpload[] = $results['image'];
			}else{
				$move = $file->move('assets/images/slider', $file->getClientOriginalName());
				$doneUpload[] = $results['image']; 
			}
		}

		return Response::json(['success' => true, 'failUpload' => $failUpload, 'doneUpload' => $doneUpload]);
	}

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

	public function postDeleteSliderImage(){
		$slider_image = Slider::find(Input::get('id'));
		$delete_row = $slider_image->delete();
		$delete_file = File::delete('assets/images/slider/'.Input::get('file'));

		if (!$delete_row && !$delete_file) {
			return Response::json(['success' => false, 'file' => Input::get('file')]);
		}

		return Response::json(['success' => true, 'file' => Input::get('file')]);
	}
}