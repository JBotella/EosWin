<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

// Clase con Funciones Variadas
class FuncionesController extends Controller
{
	// Función que genera un string de cases para añadir a un select
	public static function generaCases($campo,$datos){
		$cases = '';
		foreach($datos as $id => $valor){
			if($id != null){
				$cases .= ' WHEN '.$campo.' = \''.$id.'\' THEN \''.$valor.'\'';
			}
		}
		return $cases;
	}
}
