<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LibrosOficialesController extends Controller
{
    public function librosOficiales(){
		return view('pages.librosOficiales');
	}
	public function libroOficial($id){
		return view('pages.librosOficiales.listado', ['id' => $id]);
	}
}
