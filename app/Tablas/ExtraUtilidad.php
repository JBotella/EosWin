<?php
namespace App\Tablas;
use Illuminate\Database\Eloquent\Model;
use DB;
// Consultas relacionadas con las utilidades
class ExtraUtilidad extends Model
{
	protected $conexion1= 'sqlsrv1';
    // Periodo
	public function periodo(){
		$listado = DB::connection($this->conexion1)->table('MODULOSPERIODOS');
		return $listado;
	}
}
