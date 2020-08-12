<?php

namespace App\Tablas;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
	protected $connection= 'sqlsrv1';
    protected $table = 'EMP';
}
