<?php
namespace App\Tablas;
use Illuminate\Database\Eloquent\Model;
use DB;

class Utilidad extends Model
{
	public function consulta($parametros){
		$db = $parametros->db;
		$tabla = $parametros->tabla;
		$consulta = DB::connection($db)->table($tabla);
		if(isset($parametros->tipoIdent) and $parametros->tipoIdent == 'compuesto'){
			$cadenaIds = implode(',',$parametros->identCompuesto);
			$cadenaIdsAlias = str_replace(',','',$cadenaIds);
			$consulta->addSelect(DB::raw("".$parametros->identConcat." AS ".$cadenaIdsAlias.",*"));
		}
		if(isset($parametros->addSelect)){
			$consulta->addSelect(DB::raw($parametros->addSelect));
		}
		return $consulta;
	}
    public function listado($parametros,$variables = NULL){
		$listado = $this->consulta($parametros);
		if(isset($variables)){
			$variables = json_decode($variables);
			if(isset($parametros->condicion)){ // Condicion extra
				$condicion = (object)$parametros->condicion;
				$prefijo = $condicion->prefijo;
				$listado = $listado->$prefijo($condicion->columna,$condicion->valores);
			}
			if(isset($variables->busqueda)){ // Filtro de búsqueda
				$busqueda = $variables->busqueda;
				$columnasBusqueda = $parametros->columnasBusqueda;
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
		$db = $filtroChecks->db;
		$tabla = $filtroChecks->tabla;
		$ident = $filtroChecks->ident;
		$nombre = $filtroChecks->nombre;
		$listado = DB::connection($db)->table($tabla)->select("".$ident." as id", "".$nombre." as nombre")->orderBy($ident,'desc');
		$listado = $listado->get();
		return $listado;
	}
	public function filtroSelect($select){
		$filtroSelect = (object)$select;
		$db = $filtroSelect->db;
		$tabla = $filtroSelect->tabla;
		$ident = $filtroSelect->ident;
		$nombre = $filtroSelect->nombre;
		$listado = DB::connection($db)->table($tabla)->select("".$ident." as id", "".$nombre." as nombre")->orderBy($ident,'desc');
		$listado = $listado->get();
		return $listado;
	}
	public function formulario($parametros,$item = NULL){
		$datos = $this->consulta($parametros);
		if($parametros->funcion == 'listado'){ // Para elementos de listado
			if($item){ // Editar item de listado
				if(isset($parametros->identConcat)){
					$datos = $datos->where(DB::raw($parametros->identConcat),$item);
				}else{
					$datos = $datos->where($parametros->ident,$item);
				}
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
