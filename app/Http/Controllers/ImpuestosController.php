<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ImpuestosController extends Controller
{
    public function impuestos(){
		return view('pages.impuestos');
	}
	public function formulario($id){
		return view('pages.impuestos.formulario', ['id' => $id]);
	}
}
