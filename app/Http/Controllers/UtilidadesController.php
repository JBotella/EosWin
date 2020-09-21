<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tablas\Utilidad;

class UtilidadesController extends Controller
{
    public function utilidades(){
		return view('pages.utilidades');
	}
	public function parametrosUtilidad($id){
		/* Variables para la carga de listas */
		switch($id){
			/* Sistema */
			case 'modulos-tributacion':
				$parametros = [
					'textos' => 'utilidades.sistema.modulos_tributacion',
					'db' => 'sqlsrv1',
					'tabla' => 'MODULOS',
					'funcion' => 'listado',
					'ident' => 'CODIGO',
					'orden' => 'CODIGO',
					'direccionOrden' => 'ASC',
					'columnasBusqueda' => ['CODIGO','NOMBRE','PERIODO'],
					'columnas' => [
						'codigo' => 'CODIGO',
						'nombre' => 'NOMBRE',
						'periodo' => 'PERIODO',
					],
				];
			break;
			case 'tipos-iva-igic':
				$parametros = [
					'textos' => 'utilidades.sistema.tipos_iva_igic',
					'db' => 'sqlsrv1',
					'tabla' => 'IVATAB',
					'condicion' => [
						'prefijo' => 'whereIn',
						'columna' => 'CodiIVA',
						'valores' => [1,2,3,4,5,6,7,8,9,10],
					],
					'funcion' => 'listado',
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
				];
			break;
			case 'tipos-irpf':
				$parametros = [
					'textos' => 'utilidades.sistema.tipos_irpf',
					'db' => 'sqlsrv1',
					'tabla' => 'IVATAB',
					'condicion' => [
						'prefijo' => 'whereIn',
						'columna' => 'CodiIVA',
						'valores' => [11,12,13,14,15,16,17,18,19,20],
					],
					'funcion' => 'listado',
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
				];
			break;
			case 'operaciones-contables':
				$parametros = [
					'textos' => 'utilidades.sistema.operaciones_contables',
					'db' => 'sqlsrv1',
					'tabla' => 'OPERACIONES_EOS',
					'funcion' => 'listado',
					'ident' => 'CODOPERACION',
					'orden' => 'CODOPERACION',
					'direccionOrden' => 'ASC',
					'columnasBusqueda' => ['CODOPERACION','DESOPERACION'],
					'columnas' => [
						'codigo' => 'CODOPERACION',
						'descripcion' => 'DESOPERACION',
						'ingreso-gasto' => 'INGRESOGASTO',
						'columna-libro-registro' => 'COLUMNAREGISTRO',
					],
				];
			break;
			case 'conceptos-contables':
				$parametros = [
					'textos' => 'utilidades.sistema.conceptos_contables',
					'db' => 'sqlsrv2',
					'tabla' => 'DESCRIP',
					'funcion' => 'listado',
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
			case 'seguimiento-lopd':
				$parametros = [
					'textos' => 'utilidades.herramientas.seguimiento_lopd',
					'db' => 'sqlsrv2',
					'tabla' => 'LPDLOG',
					'funcion' => 'listado',
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
						'proceso' => 'PROCESO',
						'mensaje' => 'TEXTO',
					],
				];
			break;
		}
		$parametros += ['rutaForm' => ''];
		return (object)$parametros;
	}
	public function utilidad($id){
		$parametros = $this->parametrosUtilidad($id);
		return view('pages.utilidades.lista', ['id' => $id, 'parametros' => $parametros]);
	}
	public function lista($id,$variables){
		$parametros = $this->parametrosUtilidad($id);
		$funcion = $parametros->funcion;
		$utilidad = new Utilidad;
		$listado = $utilidad->$funcion($parametros,$variables);
		$rutaVer = '';
		$rutaAbrir = '';
		return view('pages.utilidades.listas.lista-generada', ['listado' => $listado, 'rutaVer' => $rutaVer, 'rutaAbrir' => $rutaAbrir, 'parametros' => $parametros]);
	}
	public function formulario($id,$item){
		return view('pages.utilidades.formulario', ['id' => $id,'item' => $item]);
	}
}
