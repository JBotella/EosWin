<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tablas\Proveedor;

class ProveedoresController extends Controller
{
    public function proveedores(){
		return view('pages.proveedores');
	}
	public function lista($variables){
		$proveedores = new Proveedor();
		$listado = $proveedores->listadoCompleto($variables);
		$rutaVer = route("verProveedor", [":id"]);
		$rutaAbrir = route("proveedor", [":id"]);
		return view('pages.proveedores.listaProveedores', ['listado' => $listado, 'rutaVer' => $rutaVer, 'rutaAbrir' => $rutaAbrir]);
	}
	public function ver($id){
	}
	public function formulario($id){
	}
	public function guardar($id, Request $request){
	}
	public function borrar(Request $request){
		$lineas = $request->lineas;
		foreach($lineas as $linea){
			echo 'Borra: '.$linea; // Pendiente crear consulta
		}
	}
	public function extracto(Request $request){
		$lineas = $request->lineas;
		foreach($lineas as $linea){
			echo 'Extracto: '.$linea; // Pendiente
		}
	}
	public function exporta($formato, Request $request){
		$columnasActivas = $request->columnasActivas;
		$lineas = $request->checkProveedor;
		$proveedores = new Proveedor();
		$listado = collect($proveedores->listadoReporte());
		$lista = collect(array());
		/* Zona horaria por defecto */
		date_default_timezone_set('Europe/Madrid');
		/* Nombre de archivo con fecha y hora */
		$nombreArchivo = 'proveedores_'.date('Y-m-d_H-i');
		$reportes = new ReportesController();
		$identificador = 'ProvCodigo';
		/* Columnas */
		$nombresColumnas = [
			'ProvCodigo',
			'ProvNombre',
			'ProvCif',
			'ProvTelefono',
			'ProvEMail',
			'ProvDireccion',
			'ProvCodPostal',
			'ProvLocalidad',
			'ProvProvincia'
		];
		/* Alias para las columnas */
		$nombresAlias = [
			trans('texto.tabla_proveedores.codigo'),
			trans('texto.tabla_proveedores.nombre'),
			trans('texto.tabla_proveedores.nif'),
			trans('texto.tabla_proveedores.telefono'),
			trans('texto.tabla_proveedores.email'),
			trans('texto.domicilio_fiscal.domicilio.domicilio'),
			trans('texto.domicilio_fiscal.codigo_postal'),
			trans('texto.domicilio_fiscal.localidad'),
			trans('texto.domicilio_fiscal.provincia')
		];
		$arrayLista = $reportes->creaListaFormateada($listado,$lista,$lineas,$columnasActivas,$identificador,$nombresColumnas,$nombresAlias);
		$reporte = $reportes->generaReporte($formato,$arrayLista,$nombreArchivo);
		return $reporte;
	}
}
