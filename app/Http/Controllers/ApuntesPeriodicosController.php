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
	public function estado($id,$valor){
		if($valor === 'true'){
			echo $id.': si';
		}else{
			echo $id.': no';
		} // Provisional
	}
	public function formulario($id){
		return view('pages.apuntesPeriodicos.formularioApuntePeriodico', ['id' => $id]);
	}
	public function selectorTipo(Request $request){
		$carga = $request->carga;
		$valor = $request->valor;
		switch($carga){
			case 'selectorOperacion':
				$operacion = DB::connection('sqlsrv1')->table('OPERACIONES_EOS')->select('CODOPERACION as codigo','DESOPERACION as nombre')->where('INGRESOGASTO',$valor)->orderBy('DESOPERACION','ASC')->get();
				$lista = $operacion;
			break;
			case 'selectorCuenta':
				switch($valor){
					case 'I':
						$clientes = Cliente::select('CliCodigo as codigo','CliNombre as nombre')->get();
						$lista = $clientes;
					break;
					case 'G':
						$proveedores = Proveedor::select('ProvCodigo as codigo','ProvNombre as nombre')->get();
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
