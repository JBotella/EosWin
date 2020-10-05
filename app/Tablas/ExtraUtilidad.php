<?php
namespace App\Tablas;
use Illuminate\Database\Eloquent\Model;
use DB;
// Consultas relacionadas con las utilidades
class ExtraUtilidad extends Model
{
	protected $conexion1= 'sqlsrv1';
	// Tipo de Actividad Empresarial
	public function tipoActividad(){
		$listado = DB::connection($this->conexion1)->table('TIPOSACTIVIDAD');
		return $listado;
	}
    // Periodo
	public function periodo(){
		$listado = DB::connection($this->conexion1)->table('MODULOSPERIODOS');
		return $listado;
	}
	// Columnas en el Libro de Registro
	public function columnasLibroRegistro(){
		$listado = DB::connection($this->conexion1)->table('COLUMNASLIBROREGISTRO');
		return $listado;
	}
}
