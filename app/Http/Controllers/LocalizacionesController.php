<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
use App\Tablas\Localizaciones;

class LocalizacionesController extends Controller
{
    
	public function listaLocalidadesMin(){
		$localizacion = new Localizaciones;
		$localidades = $localizacion->listaMunicipiosCompleta()->get();
		return view('pages.localizaciones.listaLocalidadesMin', ['listado' => $localidades]);
	}
}
