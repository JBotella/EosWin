<?php
namespace App\Tablas;
use Illuminate\Database\Eloquent\Model;
use DB;

class Proveedor extends Model
{
    protected $connection= 'sqlsrv2';
    protected $table = 'PROVEEDORESTABLA';
}
