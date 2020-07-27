<?php
namespace App\Http\Controllers;
use App\Tablas\Cliente;

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function clientes(){
		return view('pages.clientes');
	}
    public function listaClientes(){
		$clientes = new Cliente();
		$listado = $clientes->listadoCompletoClientes();
		return view('pages.clientes.listaClientes', ['listado' => $listado]);
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
