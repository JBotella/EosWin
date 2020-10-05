<?php
namespace App\Tablas;
use Illuminate\Database\Eloquent\Model;
use DB;

class Localizaciones extends Model
{
    protected $conexion1= 'sqlsrv1';
	// Lista de tipos de vía
	public function tiposVia(){
		$listado = DB::connection($this->conexion1)->table('TIPOSDEVIA')->get();
		return $listado;
	}
	// Lista de municipios con Provincia
	public function listaMunicipiosCompleta(){
		$listado = DB::connection($this->conexion1)->table('MUNICIPIOS')->leftJoin('Provincias', DB::raw('SUBSTRING(MUNICIPIOS.CODIGO,1,2)'), '=', 'Provincias.Codigo');
		return $listado;
	}
}
