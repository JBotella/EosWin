<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use App\Tablas\UserAjuste;

class AjustesController extends Controller
{
	/* Menú SideBar */
	public static function menuPlegado($plegado){
		session::put("menuPlegado", $plegado);
	}
	/* Columnas de Tabla Clientes */
	public static function columnasVisibles($desde,$columnas){
		$columnas = str_replace('-',',',$columnas);
		// Update de tabla ajustes
		$idUsuario = Auth::user()->id;
		$ajuste = UserAjuste::where('id_user',$idUsuario)->first();
		$ajuste->$desde = $columnas;
		$ajuste->save();
		session::put($desde, $columnas);
	}
}
