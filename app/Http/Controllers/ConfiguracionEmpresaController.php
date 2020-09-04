<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Tablas\Empresa;

class ConfiguracionEmpresaController extends Controller
{
    public function configuracion(){
		$datosEmpresa = Empresa::where('MENUMEMPRESA',Session::get("ultimaEmpresa"))->first();
		$empresa = new Empresa;
		$actividadesEmpresa = $empresa->actividadesEmpresa();
		return view('pages.configuracionEmpresa.configuracion',['datosEmpresa'=>$datosEmpresa,'actividadesEmpresa'=>$actividadesEmpresa]);
	}
	public function nuevaEmpresa(){
	}
}
