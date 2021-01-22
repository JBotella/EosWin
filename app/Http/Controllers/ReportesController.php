<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use PDF;

class ReportesController extends Controller
{
	public function creaListaFormateada($listado,$lista,$lineas,$columnasActivas,$identificador,$nombresColumnas,$nombresAlias){
		$arrayLista = array();
		foreach($lineas as $index => $linea){
			$lineaListado = $listado->where($identificador,$linea);
			$lista = $lista->concat($lineaListado);
			/* Reconvertir en array desde un array de un string separado por comas */
			$columnasActivas = explode(',', implode(",", $columnasActivas));
			$arrayLinea = [];
			foreach($columnasActivas as $num => $columna){
				$arrayLinea[$columna] = $lista[$index]->$columna;
				$idArr = array_search($columna, $nombresColumnas, true);
				if(false !== $idArr){
					$arrayLinea[$nombresAlias[$idArr]] = $arrayLinea[$columna];
					unset($arrayLinea[$columna]);
				}
			}
			array_push($arrayLista, $arrayLinea);
		}
		return $arrayLista;
	}
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
				$valorCodificado = utf8_decode($valor[$columna]);
				array_push($filasB,$valorCodificado);
			}
			array_push($filas,$filasB);
		}
		return ['columnas'=>$columnas, 'filas'=>$filas];
	}
    public function generaReporte($formato,$arrayLista,$nombreArchivo){
		switch($formato){
			case 'pdf':
				$reporte = $this->generaReportePdf($arrayLista,$nombreArchivo);
				return $reporte;
			break;
			case 'csv':
				$reporte = $this->generaReporteCsv($arrayLista,$nombreArchivo);
				return $reporte;
			break;
			case 'excel':
				$reporte = $this->generaReporteExcel($arrayLista,$nombreArchivo);
				return $reporte;
			break;
		}
	}
    public function generaReportePdf($datos,$nombreArchivo){
		$reporte = $this->generaEstructuraReporte($datos);
		$tabla = self::generaTablaExtracto($reporte);
		$data = $tabla;
		$nombreArchivo .= '.pdf';
		/* Generar PDF */
        $pdf = PDF::loadView('reportes.reportePdf', ['data'=>$data, 'nombreArchivo'=>$nombreArchivo]);
		$pdf->setPaper('A4', 'landscape');
		return $pdf->stream($nombreArchivo);	
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
	public function generaReporteExcel($datos,$nombreArchivo){
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
	public static function generaTablaExtracto($datos){
		$datosColumnas = $datos['columnas'];
		$datosFilas = $datos['filas'];
		$filasTabla = '';
		$columnasCabecera = '';
		// Genera filas
		foreach($datosFilas as $ind => $val){
			$columnasTabla = '';
			// Genera columnas
			$columnasCabecera = '';
			foreach($val as $keyval => $v){
				$columnasCabecera .= '<th class="celdaColumnaReporte">'.$datosColumnas[$keyval].'</th>';
				$columnasTabla .= '<td class="celdaReporte">'.$v.'</td>';
			}
			$filasTabla .= '<tr>'.$columnasTabla.'</tr>';
		}
		$cuerpoTabla = '<tbody>'.$filasTabla.'</tbody>';
		$cabeceraTabla = '<thead><tr>'.$columnasCabecera.'</tr></thead>';
		$tabla = '<table class="tablaReporte">'.$cabeceraTabla.$cuerpoTabla.'</table>';
		return $tabla;
	}
	
}
