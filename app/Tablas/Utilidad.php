<?php
namespace App\Tablas;
use Illuminate\Database\Eloquent\Model;
use DB;

class Utilidad extends Model
{
    public function listado($parametros,$variables = NULL){
		$db = $parametros->db;
		$tabla = $parametros->tabla;
		
		$columnasBusqueda = $parametros->columnasBusqueda;
		$listado = DB::connection($db)->table($tabla);
		if(isset($variables->busqueda)){
			$busqueda = $variables->busqueda;
			dd($busqueda);
			foreach($columnasBusqueda as $columna){
				$listado->orWhere($columna,'like',$busqueda);
			}
		}
		$listado = $listado->get();
		return $listado;
	}
}
