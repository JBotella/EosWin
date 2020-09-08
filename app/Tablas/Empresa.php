<?php
namespace App\Tablas;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
use DB;

class Empresa extends Model
{
	protected $connection= 'sqlsrv1';
    protected $table = 'EMP';
	//protected $primaryKey = 'MENUMEMPRESA';
	public $timestamps = false;
	
	public function actividadesEmpresa(){
		$actividadesEmpresa = DB::connection('sqlsrv1')->table('ACTIVIDADES_EOS')->where('CODIGOEMPRESA', Auth::user()->id)->get();
		return $actividadesEmpresa;
	}
	public function guardaEmpresa($request){
		if($request->criterioCaja){
			$criterioCaja = -1;
		}else{
			$criterioCaja = 0;
		}
		$this->where("MENUMEMPRESA",Session::get("ultimaEmpresa"))->update([
			'MENOMBRE' => $request->nombre,
			'MECIF' => $request->cif,
			'MECODCNAE' => $request->cnae,
			'MEDOMICILIO' => $request->domicilio,
			'MENUM' => $request->numero,
			'MEESC' => $request->escalera,
			'MEPISO' => $request->piso,
			'MEPUERTA' => $request->puerta,
			'MECP' => $request->cp,
			'MELOCALIDAD' => $request->localidad,
			'MEPROVINCIA' => $request->provincia,
			'MECORREOELECT' => $request->email,
			'METELEFONO' => $request->telefono,
			'MENUMEROFAX' => $request->fax,
			'CRITERIOCAJA' => $criterioCaja,
		]);
	}
	/* Sin uso */
	public function empresasUsuario(){
		$empresas = DB::connection('sqlsrv1')->table('USUARIOSAPPEMPRESAS')->leftJoin('EMP', 'USUARIOSAPPEMPRESAS.EMPRESA', '=', 'EMP.MENUMEMPRESA')->where('USUARIO', Auth::user()->id)->get();
		return $empresas;
	}
}
