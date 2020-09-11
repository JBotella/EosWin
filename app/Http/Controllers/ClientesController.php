<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tablas\Cliente;

class ClientesController extends Controller
{
    public function clientes(){
		return view('pages.clientes');
	}
    public function listaClientes($variables){
		$clientes = new Cliente();
		$listado = $clientes->listadoCompleto($variables);
		$rutaVer = route("verCliente", [":id"]);
		$rutaAbrir = route("cliente", [":id"]);
		return view('pages.clientes.listaClientes', ['listado' => $listado, 'rutaVer' => $rutaVer, 'rutaAbrir' => $rutaAbrir]);
	}
    public function listaClientesMin(){
		$clientes = new Cliente();
		$listado = $clientes->listadoCompleto();
		$rutaVer = route("verCliente", [":id"]);
		$rutaAbrir = route("cliente", [":id"]);
		return view('pages.clientes.listaClientesMin', ['listado' => $listado, 'rutaVer' => $rutaVer, 'rutaAbrir' => $rutaAbrir]);
	}
	public function formularioCliente($id){
		$cliente = new Cliente();
		$datos = $cliente->datos($id);
		$telefonos = $cliente->telefonos($id);
		return view('pages.clientes.formularioCliente', ['datos' => $datos, 'telefonos' => $telefonos]);
	}
	public function guardar($id, Request $request){
		$cliente = new Cliente;
		$cliente->guarda($id, $request);
		return redirect(route("clientes"));
	}
	public function borraClientes(Request $request){
		$lineas = $request->lineas;
		foreach($lineas as $linea){
			echo 'Borra: '.$linea; // Pendiente crear consulta
		}
	}
	public function extractoClientes(Request $request){
		$lineas = $request->lineas;
		foreach($lineas as $linea){
			echo 'Extracto: '.$linea; // Pendiente
		}
	}
	public function exportaClientes($formato, Request $request){
		$columnasActivas = $request->columnasActivas;
		$lineas = $request->checkCliente;
		$clientes = new Cliente();
		$listado = collect($clientes->listadoReporte());
		$lista = collect(array());
		$arrayLista = self::creaListaFormateada($listado,$lista,$lineas,$columnasActivas);
		/* Zona horaria por defecto */
		date_default_timezone_set('Europe/Madrid');
		/* Nombre de archivo con fecha y hora */
		$nombreArchivo = 'clientes_'.date('Y-m-d_H-i');
		$reportes = new ReportesController();
		switch($formato){
			case 'pdf':
				$reporte = $reportes->generaReportePdf($arrayLista,$nombreArchivo);
				return $reporte;
			break;
			case 'csv':
				$reporte = $reportes->generaReporteCsv($arrayLista,$nombreArchivo);
				return $reporte;
			break;
			case 'excel':
				$reporte = $reportes->generaReporteExcel($arrayLista,$nombreArchivo);
				return $reporte;
			break;
		}
	}
	static function creaListaFormateada($listado,$lista,$lineas,$columnasActivas){
		$arrayLista = array();
		foreach($lineas as $index => $linea){
			$lineaListado = $listado->where('CliCodigo',$linea);
			$lista = $lista->concat($lineaListado);
			/* Reconvertir en array desde un array de un string separado por comas */
			$columnasActivas = explode(',', implode(",", $columnasActivas));
			$arrayLinea = [];
			$nombreColumna = ['CliCodigo','CliNombre','CliCif','Telefono','CliEMail','CliDireccion','CliCodPostal','CliCodPostalLocali','CliCodPostalProvin'];
			$nombreAlias = ['Código','Nombre','NIF','Teléfono','E-Mail','Dirección','Código Postal','Localidad','Provincia'];
			foreach($columnasActivas as $num => $columna){
				$arrayLinea[$columna] = $lista[$index]->$columna;
				$idArr = array_search($columna, $nombreColumna, true);
				if(false !== $idArr){
					$arrayLinea[$nombreAlias[$idArr]] = $arrayLinea[$columna];
					unset($arrayLinea[$columna]);
				}
			}
			array_push($arrayLista, $arrayLinea);
		}
		return $arrayLista;
	}
	public function verCliente($id){
		$cliente = new Cliente();
		$datos = $cliente->datos($id);
		$telefonos = $cliente->telefonos($id);
		return view('pages.clientes.verCliente', ['datos' => $datos, 'telefonos' => $telefonos]);
	}
}
