<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ConstantesController extends Controller
{
	// Listados de constantes con su valor y traducción en algunos casos
    public static function listaConstantes($id){
		switch($id){
			case 'tipo-telefono':
				$valores = [
					'01' => trans('constantes.'.$id.'.01'),
					'02' => trans('constantes.'.$id.'.02'),
					'03' => trans('constantes.'.$id.'.03'),
					'04' => trans('constantes.'.$id.'.04'),
					'05' => trans('constantes.'.$id.'.05'),
				];
			break;
			case 'ingreso-gasto':
				$valores = [
					'I' => trans('constantes.'.$id.'.I'),
					'G' => trans('constantes.'.$id.'.G'),
				];
			break;
			case 'columna-libro-registro': // INACTIVA: Reemplazada por la tabla COLUMNASLIBROREGISTRO en SUITE_NET
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
					null => trans('constantes.'.$id.'.todas'),
					'1' => trans('constantes.'.$id.'.1'),
					'2' => trans('constantes.'.$id.'.2'),
					'3' => trans('constantes.'.$id.'.3'),
					'4' => trans('constantes.'.$id.'.4'),
					'5' => trans('constantes.'.$id.'.5'),
					'6' => trans('constantes.'.$id.'.6'),
					'7' => trans('constantes.'.$id.'.7'),
					'8' => trans('constantes.'.$id.'.8'),
					'9' => trans('constantes.'.$id.'.9'),
				];
			break;
			case 'procesos-seguimiento-lopd':
				$valores = [
					null => trans('constantes.'.$id.'.todos'),
					'Sesion' => trans('constantes.'.$id.'.Sesion'),
					'Usuarios' => trans('constantes.'.$id.'.Usuarios'),
					'Empresas' => trans('constantes.'.$id.'.Empresas'),
					'Clientes' => trans('constantes.'.$id.'.Clientes'),
					'Abogados' => trans('constantes.'.$id.'.Abogados'),
					'Asuntos' => trans('constantes.'.$id.'.Asuntos'),
					'Personal' => trans('constantes.'.$id.'.Personal'),
					'Proveedores' => trans('constantes.'.$id.'.Proveedores'),
					'Procuradores' => trans('constantes.'.$id.'.Procuradores'),
					'Representantes' => trans('constantes.'.$id.'.Representantes'),
					'Operarios' => trans('constantes.'.$id.'.Operarios'),
					'Cuentas' => trans('constantes.'.$id.'.Cuentas'),
					'Bancos' => trans('constantes.'.$id.'.Bancos'),
					'Impuesto' => trans('constantes.'.$id.'.Impuesto'),
					'Remesas' => trans('constantes.'.$id.'.Remesas'),
					'Transferencias' => trans('constantes.'.$id.'.Transferencias'),
					'Recibos' => trans('constantes.'.$id.'.Recibos'),
					'Copias' => trans('constantes.'.$id.'.Copias'),
					'Otros' => trans('constantes.'.$id.'.Otros'),
				];
			break;
			case 'variables-conceptos-contables':
				$valores = [
					'+DOC' => trans('constantes.'.$id.'.+DOC'),
					'+FEC' => trans('constantes.'.$id.'.+FEC'),
					'+MES' => trans('constantes.'.$id.'.+MES'),
					'+CTA' => trans('constantes.'.$id.'.+CTA'),
					'+CDE' => trans('constantes.'.$id.'.+CDE'),
				];
			break;
		}
		return $valores;
	}
}
