<?php
namespace App\Tablas;
use Illuminate\Database\Eloquent\Model;
use DB;

class Cliente extends Model
{
	protected $connection= 'sqlsrv2';
    protected $table = 'ClientesTabla';
	//protected $primaryKey = 'CliCodigo';
	public $timestamps = false;
	
	public function listadoCompletoClientes($variables = NULL){
		$filtroConsulta = '';
		/* Variables de filtro */
		if(isset($variables)){
			$variables = json_decode($variables);
			if(isset($variables->busqueda)){
				$busqueda = $variables->busqueda;
				$filtroConsulta .= " WHERE (CliCodigo LIKE '%".$busqueda."%' OR CliNombre LIKE '%".$busqueda."%' OR CliCif LIKE '%".$busqueda."%' OR CliEMail LIKE '%".$busqueda."%') ";
			}
			if(isset($variables->orden) and isset($variables->direccion)){
				$orden = $variables->orden;
				$direccion = $variables->direccion;
				$filtroConsulta .= " ORDER BY '".$orden."' ".$direccion." ";
			}
		}
		/* ... */
		$clienteCompleto = DB::connection($this->connection)->select("SELECT (SELECT TOP 1 TELETELEFONO FROM [TELEFON] WHERE TELECODIGO = ClientesTabla.CliCodigo) AS Telefono, * FROM ClientesTabla ".$filtroConsulta." ;");
		return $clienteCompleto;
	}
	public function datosCliente($CliCodigo){
		$cliente = Cliente::where('CliCodigo',$CliCodigo)->first();
		return $cliente;
	}
	public function telefonosCliente($CliCodigo){
		$telefonos = DB::connection($this->connection)->table('TELEFON')->where('TELECODIGO',$CliCodigo)->get();
		return $telefonos;
	}
	public function guardaCliente($id,$request){
		/* Asignarles valor = '' a los nulos */
		$this->where("CliCodigo",$id)->update([
			'CliNombre' => $request->nombre,
			'CliApellido1' => $request->apellido1 ?? '',
			'CliApellido2' => $request->apellido2 ?? '',
			'CliNomComercial' => $request->organizacion ?? '',
			'CliCif' => $request->nif,
			'CliEMail' => $request->email,
			'CliDireccion' => $request->direccion,
			'CliDireccionNumero' => $request->numero ?? '',
			'CliDireccionPiso' => $request->piso ?? '',
			'CliDireccionPuerta' => $request->puerta ?? '',
			'CliCodPostal' => $request->cp,
			'CliCodPostalLocali' => $request->localidad,
			'CliCodPostalProvin' => $request->provincia,
			'CliCodPostalPais' => $request->pais,
		]);
	}
}
