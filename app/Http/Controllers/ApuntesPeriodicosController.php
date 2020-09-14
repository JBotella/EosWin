<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApuntesPeriodicosController extends Controller
{
    public function apuntesPeriodicos(){
		return view('pages.apuntesPeriodicos');
	}
	public function lista($variables){
		/* Falta definir el modelo para la consulta */
		$listado = [1,2,3,4,5]; //Provisional
		return view('pages.apuntesPeriodicos.listaApuntesPeriodicos', ['listado' => $listado]);
	}
}
