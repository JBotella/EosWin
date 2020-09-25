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
			if(isset($parametros->condicion)){ // Condicion extra
				$condicion = (object)$parametros->condicion;
				$prefijo = $condicion->prefijo;
				$columna = $condicion->columna;
				$valores = $condicion->valores;
				$listado = $listado->$prefijo($columna,$valores);
			}
			if(isset($variables->busqueda)){ // Filtro de búsqueda
				$busqueda = $variables->busqueda;
				$listado->where(function($listado) use ($columnasBusqueda,$busqueda){
					foreach($columnasBusqueda as $columnaB){
						$listado->orWhere($columnaB,'like','%'.$busqueda.'%');
					}
				});
			}
			if(isset($variables->orden) and isset($variables->direccion)){ // Filtro de orden
				$orden = $variables->orden;
				$direccion = $variables->direccion;
				$listado = $listado->orderBy($orden,$direccion);
			}
		}
		$listado = $listado->get();
		return $listado;
	}
	public function filtroSelector($parametros){
		$filtroSelector = (object)$parametros->filtroSelector;
		// Habría que filtrar si hay conexión a la base de datos para consultar un listado
		$db = $filtroSelector->db;
		$tabla = $filtroSelector->tabla;
		$columnaRelacionada = $filtroSelector->columnaRelacionada;
		$ident = $filtroSelector->ident;
		$nombre = $filtroSelector->nombre;
		$listado = DB::connection($db)->table($tabla)->select("".$ident." as id", "".$nombre." as nombre");
		$listado = $listado->get();
		return $listado;
	}
	public function formulario($parametros,$item = NULL){
		$db = $parametros->db;
		$tabla = $parametros->tabla;
		$datos = DB::connection($db)->table($tabla);
		if($parametros->funcion == 'listado'){ // Para elementos de listado
			if($item){ // Editar item de listado
				$datos = $datos->where($parametros->ident,$item);
				$datos = $datos->first();
			}else{ // Nuevo item de listado
				$datos = NULL;
			}
		}elseif($parametros->funcion == 'formulario'){ // Para formularios sin listado y de elemento único
			$datos = $datos->first();
		}
		return $datos;
	}
}
