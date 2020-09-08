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
		$listado = $clientes->listadoCompletoClientes($variables);
		$rutaVer = route("verCliente", [":id"]);
		$rutaAbrir = route("cliente", [":id"]);
		return view('pages.clientes.listaClientes', ['listado' => $listado, 'rutaVer' => $rutaVer, 'rutaAbrir' => $rutaAbrir]);
	}
    public function listaClientesMin(){
		$clientes = new Cliente();
		$listado = $clientes->listadoCompletoClientes();
		$rutaVer = route("verCliente", [":id"]);
		$rutaAbrir = route("cliente", [":id"]);
		return view('pages.clientes.listaClientesMin', ['listado' => $listado, 'rutaVer' => $rutaVer, 'rutaAbrir' => $rutaAbrir]);
	}
	public function formularioCliente($id){
		$cliente = new Cliente();
		$datos = $cliente->datosCliente($id);
		$telefonos = $cliente->telefonosCliente($id);
		return view('pages.clientes.formularioCliente', ['datos' => $datos, 'telefonos' => $telefonos]);
	}
	public function guardar($id,Request $request){
		$cliente = new Cliente;
		$cliente->guardaCliente($id,$request);
		return redirect(route("clientes"));
	}
	public function borraClientes(Request $request){
		dd($request);
	}
	public function verCliente($id){
		$cliente = new Cliente();
		$datos = $cliente->datosCliente($id);
		$telefonos = $cliente->telefonosCliente($id);
		return view('pages.clientes.verCliente', ['datos' => $datos, 'telefonos' => $telefonos]);
	}
}
