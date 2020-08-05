<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LibrosOficialesController extends Controller
{
    public function librosOficiales(){
		return view('pages.librosOficiales');
	}
	public function librosOficialesListado($id){
		return view('pages.librosOficiales.listado', ['id' => $id]);
	}
}
