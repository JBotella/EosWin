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
		if(isset($variables)){
			$variables = json_decode($variables);
			if(isset($parametros->condicion)){
				$condicion = (object)$parametros->condicion;
				$prefijo = $condicion->prefijo;
				$columna = $condicion->columna;
				$valores = $condicion->valores;
				$listado = $listado->$prefijo($columna,$valores);
			}
			if(isset($variables->busqueda)){
				$busqueda = $variables->busqueda;
				$listado->where(function($listado) use ($columnasBusqueda,$busqueda){
					foreach($columnasBusqueda as $columnaB){
						$listado->orWhere($columnaB,'like','%'.$busqueda.'%');
					}
				});
			}
			if(isset($variables->orden) and isset($variables->direccion)){
				$orden = $variables->orden;
				$direccion = $variables->direccion;
				$listado = $listado->orderBy($orden,$direccion);
			}
		}
		$listado = $listado->get();
		return $listado;
	}
}
