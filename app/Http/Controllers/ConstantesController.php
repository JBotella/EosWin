<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ConstantesController extends Controller
{
    public function selector($id){
		switch($id){
			case 'ingreso-gasto':
				$valores = [
					'I' => trans('constantes.'.$id.'.I'),
					'G' => trans('constantes.'.$id.'.G'),
				];
			break;
			case 'columna-libro-registro':
				$valores = [
					'00' => trans('constantes.'.$id.'.00'),
					'01' => trans('constantes.'.$id.'.01'),
					'02' => trans('constantes.'.$id.'.02'),
					'03' => trans('constantes.'.$id.'.03'),
					'04' => trans('constantes.'.$id.'.04'),
					'05' => trans('constantes.'.$id.'.05'),
					'06' => trans('constantes.'.$id.'.06'),
					'07' => trans('constantes.'.$id.'.07'),
					'08' => trans('constantes.'.$id.'.08'),
					'09' => trans('constantes.'.$id.'.09'),
					'10' => trans('constantes.'.$id.'.10'),
				];
			break;
			case 'accion-seguimiento-lopd':
				$valores = [
					null => 'Todos',
					'1' => 'Alta',
					'2' => 'Eliminacion',
					'3' => 'Modificacion',
					'4' => 'Login',
					'5' => 'LogOut',
					'6' => 'Error',
					'7' => 'Acceso',
					'8' => 'Copia',
					'9' => 'Restauración',
				];
			break;
			case 'procesos-seguimiento-lopd':
				$valores = [
					'Empresas' => 'Empresas',
					'Proveedores' => 'Proveedores',
					'Otros' => 'Otros',
				];
			break;
		}
		return $valores;
	}
}
