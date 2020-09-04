<?php
namespace App\Tablas;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class Empresa extends Model
{
	protected $connection= 'sqlsrv1';
    protected $table = 'EMP';
	public function actividadesEmpresa(){
		$actividadesEmpresa = DB::connection('sqlsrv1')->table('ACTIVIDADES_EOS')->where('CODIGOEMPRESA', Auth::user()->id)->get();
		return $actividadesEmpresa;
	}
	/* Sin uso */
	public function empresasUsuario(){
		$empresas = DB::connection('sqlsrv1')->table('USUARIOSAPPEMPRESAS')->leftJoin('EMP', 'USUARIOSAPPEMPRESAS.EMPRESA', '=', 'EMP.MENUMEMPRESA')->where('USUARIO', Auth::user()->id)->get();
		return $empresas;
	}
}
