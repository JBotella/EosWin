<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tablas\Cliente;

class ClientesController extends Controller
{
    public function clientes(){
		return view('pages.clientes');
	}
    public function listaClientes(){
		$clientes = new Cliente();
		$listado = $clientes->listadoCompletoClientes();
		$rutaVer = route("verCliente", [":id"]);
		return view('pages.clientes.listaClientes', ['listado' => $listado, 'rutaVer' => $rutaVer]);
	}
	public function cliente($id){
		$cliente = new Cliente();
		$datos = $cliente->datosCliente($id);
		return $datos;
	}
	public function verCliente($id){
		$cliente = new Cliente();
		$datos = $cliente->datosCliente($id);
		return view('pages.clientes.verCliente', ['datos' => $datos]);
	}
	
	
}
