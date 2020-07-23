<?php
namespace App\Http\Controllers;
use DB;
use App\Tablas\Cliente;

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function clientes(){
		return view('pages.clientes');
	}
    public function listaClientes(){
		$listado = Cliente::get();
		return view('pages.listas.listaClientes', ['listado' => $listado]);
	}
}
