<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tablas\Proveedor;

class ProveedoresController extends Controller
{
    public function proveedores(){
		return view('pages.proveedores');
	}
	public function listaProveedores(){
		$listado = Proveedor::get();
		$rutaVer = route("verProveedor", [":id"]);
		return view('pages.proveedores.listaProveedores', ['listado' => $listado, 'rutaVer' => $rutaVer]);
	}
	public function proveedor($id){
	}
	public function verProveedor($id){
	}
}
