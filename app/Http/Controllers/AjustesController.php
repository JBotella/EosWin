<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use App\Tablas\UserAjuste;

class AjustesController extends Controller
{
	public function ajuste(){
		$ajuste = UserAjuste::where('id_user',Auth::user()->id)->first();
		return $ajuste;
	}
	/* Menú SideBar */
	public function menuPlegado($plegado){
		session::put("menuPlegado",$plegado);
	}
	/* Varios Ajustes de Usuario (Sin uso todavía) */
	public function usuarioAjuste($desde,$valor){
		// Filtrar ajustes permitidos
		$ajustesPermitidos = ['ultimaEmpresa','ultimoEjercicio','idioma','apuntePorCodigo','ordenEmpresas','ordenDiario'];
		if(in_array($desde,$ajustesPermitidos)){
			$ajuste = $this->ajuste();
			$ajuste->$desde = $valor;
			$ajuste->save();
			session::put($desde,$valor);
		}
	}
	/* Columnas de Tabla Clientes */
	public function columnasVisibles($desde,$columnas){
		$columnas = str_replace('-',',',$columnas);
		// Update de tabla ajustes
		$ajuste = $this->ajuste();
		$ajuste->$desde = $columnas;
		$ajuste->save();
		session::put($desde,$columnas);
	}
}
