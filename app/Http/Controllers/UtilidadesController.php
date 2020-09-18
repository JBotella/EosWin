<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tablas\Utilidad;

class UtilidadesController extends Controller
{
    public function utilidades(){
		return view('pages.utilidades');
	}
	public function parametrosUtilidad($id){
		/* Variables para la carga de listas */
		switch($id){
			case 'operaciones-contables':
				$parametros = [
					'textos' => 'utilidades.sistema.operaciones_contables',
					'db' => 'sqlsrv1',
					'tabla' => 'OPERACIONES_EOS',
					'funcion' => 'listado',
					'ident' => 'CODOPERACION',
					'orden' => 'CODOPERACION',
					'columnasBusqueda' => ['CODOPERACION','DESOPERACION'],
					'columnas' => [
						'codigo' => 'CODOPERACION',
						'descripcion' => 'DESOPERACION',
						'ingreso-gasto' => 'INGRESOGASTO',
						'columna-libro-registro' => 'COLUMNAREGISTRO',
					]
				];
			break;
		}
		$parametros += ['rutaForm' => ''];
		return (object)$parametros;
	}
	public function utilidad($id){
		$parametros = $this->parametrosUtilidad($id);
		return view('pages.utilidades.lista', ['id' => $id, 'parametros' => $parametros]);
	}
	public function lista($id,$variables){
		$parametros = $this->parametrosUtilidad($id);
		$funcion = $parametros->funcion;
		$utilidad = new Utilidad;
		$listado = $utilidad->$funcion($parametros,$variables);
		$rutaVer = '';
		$rutaAbrir = '';
		
		
		return view('pages.utilidades.listas.lista-generada', ['listado' => $listado, 'rutaVer' => $rutaVer, 'rutaAbrir' => $rutaAbrir, 'parametros' => $parametros]);
	}
	public function formulario($id,$item){
		return view('pages.utilidades.formulario', ['id' => $id,'item' => $item]);
	}
}
