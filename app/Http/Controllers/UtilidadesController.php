<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UtilidadesController extends Controller
{
    public function utilidades(){
		return view('pages.utilidades');
	}
	public function lista(){
		return view('pages.utilidades.lista');
	}
	public function formulario($id){
		return view('pages.utilidades.formulario', ['id' => $id]);
	}
}
