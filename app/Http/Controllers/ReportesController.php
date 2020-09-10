<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
	function generaEstructuraReporte($datos){
		// Definimos los array para columnas y filas
		$columnas = array();
		$filas = array();
		// Recuperamos los nombres de las columnas
		foreach($datos[0] as $dato => $valor){
			$valorCodificado = utf8_decode($dato);
			array_push($columnas,$valorCodificado);
		}
		// Recorremos los valores de las filas en función del valor de la columna
		foreach($datos as $valor){
			$filasB = array();
			foreach($columnas as $columna){
				$columna = utf8_encode($columna);
				$valorCodificado = utf8_decode($valor->$columna);
				array_push($filasB,$valorCodificado);
			}
			array_push($filas,$filasB);
		}
		
		dd($filas);
	}
    function generaReportePdf($datos){
		$this->generaEstructuraReporte($datos);
	}
	function generaReporteCsv($datos){
		
	}
}
