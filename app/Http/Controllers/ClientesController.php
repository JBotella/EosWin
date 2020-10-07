<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tablas\Cliente;
use App\Tablas\Localizaciones;

class ClientesController extends Controller
{
    public function clientes(){
		return view('pages.clientes');
	}
    public function lista($variables){
		$clientes = new Cliente();
		$listado = $clientes->listadoCompleto($variables);
		$rutaVer = route("verCliente", [":id"]);
		$rutaAbrir = route("cliente", [":id"]);
		return view('pages.clientes.listaClientes', ['listado' => $listado, 'rutaVer' => $rutaVer, 'rutaAbrir' => $rutaAbrir]);
	}
    public function listaMin(){
		$clientes = new Cliente();
		$listado = $clientes->listadoCompleto();
		$rutaVer = route("verCliente", [":id"]);
		$rutaAbrir = route("cliente", [":id"]);
		return view('pages.clientes.listaClientesMin', ['listado' => $listado, 'rutaVer' => $rutaVer, 'rutaAbrir' => $rutaAbrir]);
	}
	public function ver($id){
		$cliente = new Cliente();
		$datos = $cliente->datos($id);
		$telefonos = $cliente->telefonosCliente($id)->get();
		return view('pages.clientes.verCliente', ['datos' => $datos, 'telefonos' => $telefonos]);
	}
	public function formulario($id = null){
		if(isset($id)){
			$cliente = new Cliente();
			$datos = $cliente->datos($id);
			$telefonos = $cliente->telefonosCliente($id)->get();
			$localizacion = new Localizaciones();
			$tiposVia = $localizacion->tiposVia();
			$constantes = new ConstantesController();
			return view('pages.clientes.formularioCliente', ['datos' => $datos, 'telefonos' => $telefonos, 'tiposVia' => $tiposVia, 'constantes' => $constantes]);
		}else{
			return view('pages.clientes.formularioCliente');
		}
	}
	public function guardar($id = null, Request $request){
		$cliente = new Cliente;
		$cliente->guarda($id, $request);
		return redirect(route("clientes"));
	}
	public function borrar(Request $request){
		$cliente = new Cliente;
		$cliente->borra($request->lineas);
	}
	// Acción sobre los Teléfonos de cliente
	public function telefonoCliente(Request $request){
		$idCliente = $request->id;
		$idTelefono = $request->idTelefono;
		$accion = $request->accion;
		$cliente = new Cliente();
		if($accion == 'borrar'){
			//Desactivado
			//$telefono = $cliente->telefonosCliente($idCliente)->where('ID',$idTelefono)->delete();
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
		$lineas = $request->checkCliente;
		$clientes = new Cliente();
		$listado = collect($clientes->listadoReporte());
		$lista = collect(array());
		/* Zona horaria por defecto */
		date_default_timezone_set('Europe/Madrid');
		/* Nombre de archivo con fecha y hora */
		$nombreArchivo = 'clientes_'.date('Y-m-d_H-i');
		$reportes = new ReportesController();
		$identificador = 'CliCodigo';
		/* Columnas */
		$nombresColumnas = [
			'CliCodigo',
			'CliNombre',
			'CliCif',
			'Telefono',
			'CliEMail',
			'CliDireccion',
			'CliCodPostal',
			'CliCodPostalLocali',
			'CliCodPostalProvin'
		];
		/* Alias para las columnas */
		$nombresAlias = [
			trans('texto.tabla_clientes.codigo'),
			trans('texto.tabla_clientes.nombre'),
			trans('texto.tabla_clientes.nif'),
			trans('texto.tabla_clientes.telefono'),
			trans('texto.tabla_clientes.email'),
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
