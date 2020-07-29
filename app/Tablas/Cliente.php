<?php
namespace App\Tablas;
use Illuminate\Database\Eloquent\Model;
use DB;

class Cliente extends Model
{
	protected $connection= 'sqlsrv2';
    protected $table = 'ClientesTabla';
	
	public function listadoCompletoClientes(){
		$clienteCompleto = DB::connection($this->connection)->select('SELECT (SELECT TOP 1 TELETELEFONO FROM [TELEFON] WHERE TELECODIGO = ClientesTabla.CliCodigo) AS Telefono, * FROM ClientesTabla;');
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
}
