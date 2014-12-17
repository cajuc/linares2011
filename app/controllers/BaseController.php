<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		// Compartir nombre del club en todas las vistas
		$club = ObtenerRecursos::obtenerClub();
		View::share('club', $club);

		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
}
