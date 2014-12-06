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
	public static function obtenerDatosClasificacion($categoria){
		$liga = DB::table('equipos')->join('categorias', 'equipos.categoria_id', '=', 'categorias.id')
						->where('categorias.nombre', '=', $categoria)
						->where('belongs', '=', '1')
						->select('liga_id')->get();

		$liga = DB::table('ligas')->join('equipos', 'ligas.id', '=', 'equipos.liga_id')
						->join('estadisticas', 'equipos.id', '=', 'estadisticas.equipo_id')
						->where('ligas.id', '=', $liga[0]->liga_id)
						->orderBy('estadisticas.puntos', 'Desc')
						->select('estadisticas.*', 'equipos.*', 'ligas.nombre as liga')->get();
						// var_dump($equipos);die();

		return $liga;
	}
}