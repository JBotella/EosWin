<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Tablas\Cliente;
use App\Tablas\Proveedor;

class ApuntesPeriodicosController extends Controller
{
    public function apuntesPeriodicos(){
		return view('pages.apuntesPeriodicos');
	}
	public function lista($variables){
		/* Falta definir el modelo para la consulta */
		$listado = [1,2,3,4,5]; //Provisional
		$rutaAbrir = route("apuntePeriodico", [":id"]);
		return view('pages.apuntesPeriodicos.listaApuntesPeriodicos', ['listado' => $listado, 'rutaAbrir' => $rutaAbrir]);
	}
	public function formulario($id){
		return view('pages.apuntesPeriodicos.formularioApuntePeriodico', ['id' => $id]);
	}
	public function selectorTipo(Request $request){
		$carga = $request->carga;
		$valor = $request->valor;
		switch($carga){
			case 'selectorOperacion':
				$operacion = DB::connection('sqlsrv1')->table('OPERACIONES_EOS')->select('CODOPERACION as id','DESOPERACION as nombre')->where('INGRESOGASTO',$valor)->get();
				$lista = $operacion;
			break;
			case 'selectorCuenta':
				switch($valor){
					case 'I':
						$clientes = Cliente::select('CliCodigo as id','CliNombre as nombre')->get();
						$lista = $clientes;
					break;
					case 'G':
						$proveedores = Proveedor::select('ProvCodigo as id','ProvNombre as nombre')->get();
						$lista = $proveedores;
					break;
				}
			break;
		}
		echo $lista;
	}
	public function guardar($id, Request $request){
		dd($request);
		return redirect(route("apuntesPeriodicos"));
	}
}
