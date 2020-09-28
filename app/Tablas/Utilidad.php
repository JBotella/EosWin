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
			if(isset($parametros->filtroChecks)){
				if(isset($variables->filtroChecks) and $variables->filtroChecks != NULL){ // Filtro de checks
					$filtroChecks = $variables->filtroChecks;
					$columnaRelacionada = $parametros->filtroChecks['columnaRelacionada'];
					$filtroChecksArray = explode(',',$filtroChecks);
					$listado->where(function($listado) use ($filtroChecksArray,$columnaRelacionada){
						foreach($filtroChecksArray as $check){
							$listado->orWhere($columnaRelacionada,$check);
						}
					});
				}
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
	public function filtroChecks($parametros){
		$filtroChecks = (object)$parametros->filtroChecks;
		// Habría que filtrar si hay conexión a la base de datos para consultar un listado
		$db = $filtroChecks->db;
		$tabla = $filtroChecks->tabla;
		$columnaRelacionada = $filtroChecks->columnaRelacionada;
		$ident = $filtroChecks->ident;
		$nombre = $filtroChecks->nombre;
		$listado = DB::connection($db)->table($tabla)->select("".$ident." as id", "".$nombre." as nombre")->orderBy($ident,'desc');
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
