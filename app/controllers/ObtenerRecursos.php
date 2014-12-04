<?php
class ObtenerRecursos extends BaseController{
	
	// Función para obtener todas las categorías
	public static function obtenerCategorias(){
		$categorias = Categoria::all();

		foreach ($categorias as $categoria) {
			foreach ($categoria->equipos as $key => $equipo) {
				if (!$equipo->belongs) {
					unset($categoria->equipos[$key]);
				}
			}
		}

		return $categorias;
	}

	// Función para obtener los datos para 'Clasificación'
	public static function obtenerDatosClasificacion($liga){
		$liga = DB::table('ligas')->join('equipos', 'ligas.id', '=', 'equipos.liga_id')
					->join('estadisticas', 'equipos.id', '=', 'estadisticas.equipo_id')
					->where('ligas.id', '=', $liga)->select('estadisticas.*', 'equipos.nombre', 'ligas.nombre as liga')
					->orderBy('puntos', 'Desc')->get();

		// var_dump($liga);die();
		return $liga;
	}
}