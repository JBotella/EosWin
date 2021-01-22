<?php
namespace App\Tablas;
use Illuminate\Database\Eloquent\Model;
use DB;

class Proveedor extends Model
{
    protected $connection= 'sqlsrv2';
    protected $table = 'PROVEEDORESTABLA';
	//protected $primaryKey = 'ProvCodigo';
	public $timestamps = false;
	
	public function listadoCompleto($variables = NULL){
		$filtroConsulta = '';
		$proveedor = new Proveedor();
		/* Variables de filtro */
		if(isset($variables)){
			$variables = json_decode($variables);
			if(isset($variables->busqueda)){
				$busqueda = $variables->busqueda;
				$proveedor = $proveedor->where('ProvCodigo','like','%'.$busqueda.'%')->orWhere('ProvNombre','like','%'.$busqueda.'%')->orWhere('ProvCif','like','%'.$busqueda.'%')->orWhere('ProvTelefono','like','%'.$busqueda.'%')->orWhere('ProvEMail','like','%'.$busqueda.'%');
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
	public function listadoReporte(){
		$proveedor = new Proveedor();
		$proveedorReporte = $proveedor->get();
		return $proveedorReporte;
	}
	public function datos($ProvCodigo){
		$proveedor = Proveedor::where('ProvCodigo',$ProvCodigo)->first();
		return $proveedor;
	}
}
