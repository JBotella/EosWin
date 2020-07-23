<?php
namespace App\Tablas;
use Illuminate\Database\Eloquent\Model;
use DB;

class Cliente extends Model
{
	protected $connection= 'sqlsrv2';
    protected $table = 'ClientesTabla';
	
	public function listadoCompletoClientes(){
		$clienteCompleto = DB::connection($this->connection)->select('select (select top 1 TELETELEFONO from [TELEFON] WHERE TELECODIGO = ClientesTabla.CliCodigo) as Telefono, * from ClientesTabla;');
		return $clienteCompleto;
	}
}
