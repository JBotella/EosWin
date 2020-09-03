<?php
namespace App\Tablas;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class Empresa extends Model
{
	protected $connection= 'sqlsrv1';
    protected $table = 'EMP';
	/* Sin uso */
	public function empresasUsuario(){
		$empresas = DB::connection('sqlsrv1')->table('USUARIOSAPPEMPRESAS')->leftJoin('EMP', 'USUARIOSAPPEMPRESAS.EMPRESA', '=', 'EMP.MENUMEMPRESA')->where('USUARIO', Auth::user()->id)->get();
		return $empresas;
	}
}
