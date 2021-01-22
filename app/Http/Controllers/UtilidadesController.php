<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tablas\Utilidad;
use App\Tablas\ExtraUtilidad;

class UtilidadesController extends Controller
{
    public function utilidades(){
		return view('pages.utilidades');
	}
	// Parámetros para cada utilidad
	public function parametrosUtilidad($id){
		$extraUtilidad = new ExtraUtilidad;
		/* Variables para la carga de listas */
		switch($id){
			/* Sistema */
			case 'actividades-empresariales':
				$parametros = [
					'textos' => 'utilidades.sistema.actividades_empresariales',
					'db' => 'sqlsrv1',
					'tabla' => 'IAES',
					'funcion' => 'listado',
					'clicListado' => 'abreForm',
					'addSelect' => '(select TIPOSACTIVIDAD.DESCRIPCION FROM TIPOSACTIVIDAD WHERE TIPOSACTIVIDAD.CLAVE LIKE IAES.CLAVE) as nTipoActividad',
					'ident' => 'ID',
					'orden' => 'CLAVE',
					'direccionOrden' => 'ASC',
					'columnasBusqueda' => ['CLAVE','EPIGRAFE','DESCRIPCION'],
					'columnas' => [
						'descripcion' => 'DESCRIPCION',
						'epigrafe' => 'EPIGRAFE',
						'tipoActividad' => 'nTipoActividad',
					],
					'filtroSelect' => [
						[
							'select' => 'TipoActividad',
							'titulo' => trans('utilidades.sistema.actividades_empresariales.campos.tipoActividad').' - ('.trans('texto.todos').')',
							'columnaRelacionada' => 'CLAVE',
							'db' => 'sqlsrv1',
							'tabla' => 'TIPOSACTIVIDAD',
							'ident' => 'CLAVE',
							'nombre' => 'DESCRIPCION',
							'orden' => 'CLAVE',
							'direccionOrden' => 'ASC',
							'selected' => 'todos',
						],
					],
					'ExtraUtilidad' => [
						'tipoActividad' => $extraUtilidad->tipoActividad()->orderBy('CLAVE','asc'),
					],
				];
			break;
			case 'modulos-tributacion':
				$parametros = [
					'textos' => 'utilidades.sistema.modulos_tributacion',
					'db' => 'sqlsrv1',
					'tabla' => 'MODULOS',
					'funcion' => 'listado',
					'clicListado' => 'abreForm',
					'cssForm' => 'visorFormAsincAncho',
					'tipoIdent' => 'compuesto',
					'identCompuesto' => ['PERIODO','CODIGO'],
					'identConcat' => 'CONCAT(PERIODO,CODIGO)',
					'addSelect' => '(select MODULOSPERIODOS.DESCRIPCION FROM MODULOSPERIODOS WHERE CODIGO LIKE PERIODO) as nPeriodo',
					'ident' => 'PERIODOCODIGO',
					'orden' => 'CODIGO',
					'direccionOrden' => 'ASC',
					'columnasBusqueda' => ['CODIGO','NOMBRE','PERIODO'],
					'columnas' => [
						'codigo' => 'CODIGO',
						'nombre' => 'NOMBRE',
						'periodo' => 'nPeriodo',
					],
					'filtroChecks' => [
						'check' => 'Periodo',
						'titulo' => trans('utilidades.sistema.modulos_tributacion.campos.periodo'),
						'columnaRelacionada' => 'PERIODO',
						'db' => 'sqlsrv1',
						'tabla' => 'MODULOSPERIODOS',
						'ident' => 'CODIGO',
						'nombre' => 'DESCRIPCION',
					],
					'filtroSelect' => [
						[
							'select' => 'Periodo',
							'titulo' => trans('utilidades.sistema.modulos_tributacion.campos.periodo'),
							'columnaRelacionada' => 'PERIODO',
							'db' => 'sqlsrv1',
							'tabla' => 'MODULOSPERIODOS',
							'ident' => 'CODIGO',
							'nombre' => 'DESCRIPCION',
							'orden' => 'CODIGO',
							'direccionOrden' => 'DESC',
						],
					],
					'ExtraUtilidad' => [
						'periodo' => $extraUtilidad->periodo()->orderBy('CODIGO','desc'),
					],
				];
			break;
			case 'indices-porcentajes-calculo':
				$parametros = [
					'textos' => 'utilidades.sistema.indices_porcentajes_calculo',
					'db' => 'sqlsrv1',
					'tabla' => 'INDICES',
					'funcion' => 'formulario',
				];
			break;
			case 'tipos-iva-igic':
				$parametros = [
					'textos' => 'utilidades.sistema.tipos_iva_igic',
					'db' => 'sqlsrv1',
					'tabla' => 'IVATAB',
					'funcion' => 'listado',
					'clicListado' => 'abreForm',
					'ident' => 'CodiIVA',
					'orden' => 'CodiIVA',
					'direccionOrden' => 'ASC',
					'columnasBusqueda' => ['CodiIVA','DescIVA'],
					'columnas' => [
						'codigo' => 'CodiIVA',
						'nombre' => 'DescIVA',
						'porcentajeIva' => 'TipoIVA2010',
						'porcentajeRe' => 'RecaIVA',
						'adonIva' => 'AdonIVA',
					],
					'condicion' => [
						'prefijo' => 'whereIn',
						'columna' => 'CodiIVA',
						'valores' => [1,2,3,4,5,6,7,8,9,10],
					],
				];
			break;
			case 'tipos-irpf':
				$parametros = [
					'textos' => 'utilidades.sistema.tipos_irpf',
					'db' => 'sqlsrv1',
					'tabla' => 'IVATAB',
					'funcion' => 'listado',
					'clicListado' => 'abreForm',
					'ident' => 'CodiIVA',
					'orden' => 'CodiIVA',
					'direccionOrden' => 'ASC',
					'columnasBusqueda' => ['CodiIVA','DescIVA'],
					'columnas' => [
						'codigo' => 'CodiIVA',
						'nombre' => 'DescIVA',
						'porcentajeIrpf' => 'TipoIVA2010',
						'adonIva' => 'AdonIVA',
					],
					'condicion' => [
						'prefijo' => 'whereIn',
						'columna' => 'CodiIVA',
						'valores' => [11,12,13,14,15,16,17,18,19,20],
					],
				];
			break;
			case 'operaciones-contables':
				$parametros = [
					'textos' => 'utilidades.sistema.operaciones_contables',
					'db' => 'sqlsrv1',
					'tabla' => 'OPERACIONES_EOS',
					'funcion' => 'listado',
					'clicListado' => 'abreForm',
					'addSelect' => 'ingrGast = CASE 
						'.FuncionesController::generaCases('INGRESOGASTO',ConstantesController::listaConstantes('ingreso-gasto')).'
					END',
					'ident' => 'CODOPERACION',
					'orden' => 'CODOPERACION',
					'direccionOrden' => 'ASC',
					'columnasBusqueda' => ['CODOPERACION','DESOPERACION'],
					'columnas' => [
						'codigo' => 'CODOPERACION',
						'descripcion' => 'DESOPERACION',
						'ingresoGasto' => 'ingrGast',
					],
					'ExtraUtilidad' => [
						'columnasLibroRegistro' => $extraUtilidad->columnasLibroRegistro()->orderBy('CODIGO','asc'),
					],
				];
			break;
			case 'conceptos-contables':
				$parametros = [
					'textos' => 'utilidades.sistema.conceptos_contables',
					'db' => 'sqlsrv2',
					'tabla' => 'DESCRIP',
					'funcion' => 'listado',
					'clicListado' => 'abreForm',
					'ident' => 'DESCCODIG',
					'orden' => 'DESCCODIG',
					'direccionOrden' => 'ASC',
					'columnasBusqueda' => ['DESCCODIG','DESCCONCE'],
					'columnas' => [
						'codigo' => 'DESCCODIG',
						'descripcion' => 'DESCCONCE',
					],
				];
			break;
			case 'formas-pago-cobro':
				$parametros = [
					'textos' => 'utilidades.sistema.formas_pago_cobro',
					'db' => 'sqlsrv2',
					'tabla' => 'FORMASPAGO',
					'funcion' => 'listado',
					'clicListado' => 'abreForm',
					'ident' => 'FORMCODIGO',
					'orden' => 'FORMCODIGO',
					'direccionOrden' => 'ASC',
					'columnasBusqueda' => ['FORMCODIGO','FORMDESCRI'],
					'columnas' => [
						'codigo' => 'FORMCODIGO',
						'descripcion' => 'FORMDESCRI',
					],
				];
			break;
			/* Herramientas */
			case 'remuneracion-asientos':
				// PENDIENTE...
			break;
			case 'importacion-asientos-excel':
				// PENDIENTE...
			break;
			case 'asistente-copia-seguridad':
				// PENDIENTE...
			break;
			case 'comprobacion-nif-terceros':
				// PENDIENTE...
			break;
			/* $constantesController->listaConstantes('accion-seguimiento-lopd') */
			case 'seguimiento-lopd':
				$parametros = [
					'textos' => 'utilidades.herramientas.seguimiento_lopd',
					'db' => 'sqlsrv2',
					'tabla' => 'LPDLOG',
					'funcion' => 'listado',
					'clicListado' => 'no',
					'addSelect' => 'nTipo = CASE 
						'.FuncionesController::generaCases('TIPO',ConstantesController::listaConstantes('accion-seguimiento-lopd')).'
					END',
					'ident' => 'ID',
					'orden' => 'FECHA',
					'direccionOrden' => 'DESC',
					'columnasBusqueda' => ['ID','USUARIO','PROCESO','TEXTO'],
					'columnas' => [
						'id' => 'ID',
						'fecha' => 'FECHA',
						'usuario' => 'USUARIO',
						'servidor' => 'SERVIDOR',
						'ordenador' => 'ORDENADOR',
						'accion' => 'nTipo',
						'proceso' => 'PROCESO',
						'mensaje' => 'TEXTO',
					],
					'filtroSelect' => [
						[
							'select' => 'Accion',
							'titulo' => trans('utilidades.herramientas.seguimiento_lopd.campos.accion'),
							'columnaRelacionada' => 'TIPO',
							'constante' => 'accion-seguimiento-lopd',
						],
						[
							'select' => 'Procesos',
							'titulo' => trans('utilidades.herramientas.seguimiento_lopd.campos.proceso'),
							'columnaRelacionada' => 'PROCESO',
							'constante' => 'procesos-seguimiento-lopd',
						],
					],
					'filtroFecha' => [
						'tipo' => 'fecha-desde-hasta',
						'columnaRelacionada' => 'FECHA',
					],
				];
			break;
		}
		$parametros += ['rutaForm' => ''];
		return (object)$parametros;
	}
	public function utilidad($id){
		$parametros = $this->parametrosUtilidad($id);
		$utilidad = new Utilidad;
		$filtroChecks = NULL;
		$filtroSelect = NULL;
		$filtroFecha = NULL;
		// Comprueba si hay que consultar alguna tabla con el filtroChecks
		if(isset($parametros->filtroChecks)){
			$filtroChecks = $utilidad->filtroChecks($parametros);
		}
		// Comprueba si hay que consultar alguna tabla con el filtroSelect
		if(isset($parametros->filtroSelect)){
			$filtrosSelect = (object)$parametros->filtroSelect;
			$filtroSelect = [];
			foreach($filtrosSelect as $idSelect){
				array_push($filtroSelect,$utilidad->filtroSelect($idSelect));
			}
		}
		// Comprueba si hay que consultar alguna tabla con el filtroFecha
		if(isset($parametros->filtroFecha)){
			$filtroFecha = $utilidad->filtroFecha($parametros);
		}
		return view('pages.utilidades.lista', ['id' => $id, 'parametros' => $parametros, 'filtroChecks' => $filtroChecks, 'filtroSelect' => $filtroSelect, 'filtroFecha' => $filtroFecha]);
	}
	public function lista($id,$variables){
		$parametros = $this->parametrosUtilidad($id);
		$funcion = $parametros->funcion;
		$utilidad = new Utilidad;
		$listado = $utilidad->$funcion($parametros,$variables);
		$rutaVer = ''; // No se usa por el momento
		$rutaAbrir = ''; // No se usa por el momento
		return view('pages.utilidades.listas.lista-generada', ['id' => $id, 'listado' => $listado, 'rutaVer' => $rutaVer, 'rutaAbrir' => $rutaAbrir, 'parametros' => $parametros]);
	}
	// Para formulario con redirección
	public function formulario($id,$item = NULL){
		return $this->cargaFormularioVista('formulario',$id,$item);
	}
	// Para formulario asíncrono
	public function formularioAsinc($id,$item = NULL){
		return $this->cargaFormularioVista('formularioAsinc',$id,$item);
	}
	public function cargaFormularioVista($form,$id,$item = NULL){
		$parametros = $this->parametrosUtilidad($id);
		$utilidad = new Utilidad;
		$datos = $utilidad->formulario($parametros,$item);
		$constantes = new ConstantesController;
		return view('pages.utilidades.'.$form.'', ['id' => $id, 'datos' => $datos, 'parametros' => $parametros, 'constantes' => $constantes]);
	}
	
	public function guardar(){
		
	}
	
}
