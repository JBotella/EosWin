<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersAjustesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_ajustes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
			$table->foreignId('id_user');
			$table->string('ultimaEmpresa')->nullable();
			$table->integer('ultimoEjercicio')->nullable();
			$table->char('idioma',5)->nullable();
			$table->boolean('apuntePorCodigo')->default(0);
			$table->integer('ordenEmpresas')->nullable();
			$table->integer('ordenDiario')->nullable();
			$table->string('columnasClientes')->nullable();
			$table->string('columnasProveedores')->nullable();
			$table->string('columnasApuntes')->nullable();
			$table->string('columnasExtracto')->nullable();
			$table->string('columnasCobrosPagos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_ajustes');
    }
}
