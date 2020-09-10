<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ReportesController extends Controller
{
	public function generaEstructuraReporte($datos){
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
				//$valorCodificado = utf8_decode($valor->$columna);
				$valorCodificado = utf8_decode($valor[$columna]);
				array_push($filasB,$valorCodificado);
			}
			array_push($filas,$filasB);
		}
		return ['columnas'=>$columnas, 'filas'=>$filas];
	}
    public function generaReportePdf($datos){
		$tabla = $this->generaEstructuraReporte($datos);
	}
	public function generaReporteCsv($datos,$nombreArchivo){
		$tabla = $this->generaEstructuraReporte($datos);
		$columnas = $tabla['columnas'];
		$filas = $tabla['filas'];
		$nombreArchivo .= '.csv';
		$headers = [
			"Content-type" => "text/csv",
			"Content-Disposition" => "attachment; filename=".$nombreArchivo,
			"Pragma" => "no-cache",
			"Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
			"Expires" => "0"
		];
		$callback = function() use ($columnas, $filas) {
			$archivo = fopen('php://output', 'w');
			fputcsv($archivo, $columnas, ';');
			foreach ($filas as $fila) {
				fputcsv($archivo, $fila, ';');
			}
			fclose($archivo);
		};
		return response()->stream($callback, 200, $headers)->send();
		/* send() = descarga | sendContent() = abre en navegador */
	}
	public function generaReporteExcel($datos){
		$tabla = $this->generaEstructuraReporte($datos);
	}
}
