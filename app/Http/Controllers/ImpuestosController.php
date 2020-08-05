<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ImpuestosController extends Controller
{
    public function impuestos(){
		return view('pages.impuestos');
	}
}
