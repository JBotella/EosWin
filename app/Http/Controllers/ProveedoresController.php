<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tablas\Proveedor;

class ProveedoresController extends Controller
{
    public function proveedores(){
		return view('pages.proveedores');
	}
	public function listaProveedores($variables){
		$proveedores = new Proveedor();
		$listado = $proveedores->listadoCompleto($variables);
		$rutaVer = route("verProveedor", [":id"]);
		$rutaAbrir = route("proveedor", [":id"]);
		return view('pages.proveedores.listaProveedores', ['listado' => $listado, 'rutaVer' => $rutaVer, 'rutaAbrir' => $rutaAbrir]);
	}
	public function formularioCliente($id){
	}
	public function verProveedor($id){
	}
}
