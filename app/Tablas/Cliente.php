<?php
namespace App\Tablas;
use Illuminate\Database\Eloquent\Model;
//use DB;

class Cliente extends Model
{
	protected $connection= 'sqlsrv2';
    protected $table = 'ClientesTabla';
	/*static function listadoClientes(){
	
	}*/
}
