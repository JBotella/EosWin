<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
use App\Tablas\Empresa;

class EmpresasController extends Controller
{
    public function configuracion(){
		$datosEmpresa = Empresa::where('MENUMEMPRESA',Session::get("ultimaEmpresa"))->first();
		$empresa = new Empresa;
		$actividadesEmpresa = $empresa->actividades();
		return view('pages.empresas.configuracion',['datosEmpresa'=>$datosEmpresa,'actividadesEmpresa'=>$actividadesEmpresa]);
	}
	public function guardar(Request $request){
		$empresa = new Empresa;
		$empresa->guarda($request);
		//return redirect(route("configuracionEmpresa"));
		return Redirect::back()->with('success', 'Guardado correctamente');
	}
	public function nueva(){
		/* ... */
	}
	public function listaDelegacionesMin(){
		$delegaciones = DB::connection('sqlsrv1')->table('DELEG')->get();
		return view('pages.empresas.listaDelegacionesMin', ['listado' => $delegaciones]);
	}
}
