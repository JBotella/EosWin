<?php
namespace App\Tablas;
use Illuminate\Database\Eloquent\Model;
use DB;

class Proveedor extends Model
{
    protected $connection= 'sqlsrv2';
    protected $table = 'PROVEEDORESTABLA';
	
	public function listadoCompletoProveedores($variables = NULL){
		$filtroConsulta = '';
		$proveedor = new Proveedor();
		/* Variables de filtro */
		if(isset($variables)){
			$variables = json_decode($variables);
			if(isset($variables->busqueda)){
				$busqueda = $variables->busqueda;
			}
			if(isset($variables->orden) and isset($variables->direccion)){
				$orden = $variables->orden;
				$direccion = $variables->direccion;
				$proveedor = $proveedor->orderBy($orden,$direccion);
			}
		}
		/* ... */
		$proveedorCompleto = $proveedor->get();
		return $proveedorCompleto;
	}
}
