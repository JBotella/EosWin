<?php
namespace App\Tablas;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Http\Controllers\ConstantesController;

class Utilidad extends Model
{
	public function consulta($parametros){
		$db = $parametros->db;
		$tabla = $parametros->tabla;
		$consulta = DB::connection($db)->table($tabla);
		$compuesta = 0;
		// Filtra si la consulta es compuesta
		if(isset($parametros->tipoIdent) and $parametros->tipoIdent == 'compuesto'){
			$cadenaIds = implode(',',$parametros->identCompuesto);
			$cadenaIdsAlias = str_replace(',','',$cadenaIds);
			$consulta->addSelect(DB::raw("".$parametros->identConcat." AS ".$cadenaIdsAlias.",*"));
			$compuesta = 1;
		}else{
			$compuesta = 0;
		}
		if(isset($parametros->addSelect)){
			if($compuesta == 0){
				$consulta->addSelect(DB::raw("".$parametros->addSelect.",*"));
			}elseif($compuesta == 1){
				$consulta->addSelect(DB::raw("".$parametros->addSelect.""));
			}
		}
		//dd($consulta->toSql()); //Debug SQL
		return $consulta;
		
	}
    public function listado($parametros,$variables = NULL){
		$listado = $this->consulta($parametros);
		if(isset($variables)){
			$variables = json_decode($variables);
			// Condicion extra
			if(isset($parametros->condicion)){
				$condicion = (object)$parametros->condicion;
				$prefijo = $condicion->prefijo;
				$listado = $listado->$prefijo($condicion->columna,$condicion->valores);
			}
			// Filtro de búsqueda
			if(isset($variables->busqueda)){
				$busqueda = $variables->busqueda;
				$columnasBusqueda = $parametros->columnasBusqueda;
				$listado->where(function($listado) use ($columnasBusqueda,$busqueda){
					foreach($columnasBusqueda as $columnaB){
						$listado->orWhere($columnaB,'like','%'.$busqueda.'%');
					}
				});
			}
			// Recuperar Filtro Checks
			if(isset($parametros->filtroChecks)){
				if(isset($variables->filtroChecks) and $variables->filtroChecks != NULL){
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
			// Recuperar Filtros Select
			if(isset($parametros->filtroSelect)){
				if(isset($variables->filtroSelect) and $variables->filtroSelect != NULL){
					$filtroSelect = $variables->filtroSelect;
					$selectores = (object)$variables->filtroSelect;
					foreach($selectores as $idSelector => $itemSelector){
						$columnaRelacionada = $parametros->filtroSelect[$idSelector]['columnaRelacionada'];
						$valor = $itemSelector->valor;
						if($valor != NULL){
							$listado->where($columnaRelacionada,$valor);
						}
					}
				}
			}
			// Recuperar Filtros Fecha
			if(isset($parametros->filtroFecha)){
				if(isset($variables->filtroFechas) and $variables->filtroFechas != NULL){
					$filtroFecha = $variables->filtroFechas;
					$selectores = (object)$variables->filtroFechas;
					foreach($selectores as $idSelector => $itemSelector){
						$columnaRelacionada = $parametros->filtroFecha['columnaRelacionada'];
						$tipo = $itemSelector->selector;
						$valor = $itemSelector->valor;
						if($valor != NULL){
							if($tipo == 'Desde'){
								$prefijo = '>=';
							}elseif($tipo == 'Hasta'){
								$prefijo = '<=';
							}
							$listado->whereDate($columnaRelacionada,$prefijo,$valor);
						}
					}
				}
			}
			// Recuperar Filtro Orden
			if(isset($variables->orden) and isset($variables->direccion)){
				$orden = $variables->orden;
				$direccion = $variables->direccion;
				$listado = $listado->orderBy($orden,$direccion);
			}
		}
		$listado = $listado->get();
		return $listado;
	}
	// Recuperar Filtro de Checks
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
	// Recuperar Filtro de Selectores
	public function filtroSelect($select){
		$filtroSelect = (object)$select;
		if(isset($filtroSelect->db) and isset($filtroSelect->tabla)){
			$db = $filtroSelect->db;
			$tabla = $filtroSelect->tabla;
			$ident = $filtroSelect->ident;
			$nombre = $filtroSelect->nombre;
			$orden = $filtroSelect->orden;
			$direccionOrden = $filtroSelect->direccionOrden;
			$listado = DB::connection($db)->table($tabla)->select("".$ident." as id", "".$nombre." as nombre")->orderBy($orden,$direccionOrden);
			$listado = $listado->get();
		}elseif(isset($filtroSelect->constante)){
			$listado = ConstantesController::listaConstantes($filtroSelect->constante);
		}
		return $listado;
	}
	// Recuperar Filtro de Fechas
	public function filtroFecha($fecha){
		$filtroFecha = (object)$fecha->filtroFecha;
		$tipo = $filtroFecha->tipo;
		if(!strpos($tipo, 'desde')){
			
		}
		if(!strpos($tipo, 'hasta')){
			
		}
	}
	// Carga datos en el formulario
	public function formulario($parametros,$item = NULL){
		$datos = $this->consulta($parametros);
		// Para elementos de listado
		if($parametros->funcion == 'listado'){
			// Editar item de listado
			if($item){
				if(isset($parametros->identConcat)){
					$datos = $datos->where(DB::raw($parametros->identConcat),$item);
				}else{
					$datos = $datos->where($parametros->ident,$item);
				}
				$datos = $datos->first();
			// Nuevo item de listado
			}else{
				$datos = NULL;
			}
		// Para formularios sin listado y de elemento único
		}elseif($parametros->funcion == 'formulario'){
			$datos = $datos->first();
		}
		return $datos;
	}
}
