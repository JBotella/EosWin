<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

/* ----- Filtrado por login auth ----- */
Route::group(['middleware' => 'auth'], function(){
	
	/* Dashboard */
	Route::get('/', 'DashboardController@dashboard')->name('dashboard');

	/* Clientes */
	Route::get('clientes', 'ClientesController@clientes')->name('clientes');
		// Lista Clientes (Asíncrona)
		Route::get('listaClientes', 'ClientesController@listaClientes')->name('listaClientes');
		// Lista Clientes Mínima (Asíncrona)
		Route::get('listaClientesMin', 'ClientesController@listaClientesMin')->name('listaClientesMin');
	Route::get('cliente/{id}', 'ClientesController@formularioCliente')->name('cliente');
		// Ver Cliente (Asíncrona)
		Route::get('verCliente/{id}', 'ClientesController@verCliente')->name('verCliente');
	
	/* Proveedores */
	Route::get('proveedores', 'ProveedoresController@proveedores')->name('proveedores');
		// Lista Proveedores (Asíncrona)
		Route::get('listaProveedores', 'ProveedoresController@listaProveedores')->name('listaProveedores');
	Route::get('proveedor/{id}', 'ProveedoresController@formularioCliente')->name('proveedor');
		// Ver Proveedor (Asíncrona)
		Route::get('verProveedor/{id}', 'ProveedoresController@verProveedor')->name('verProveedor');
	
	
	
	/* Libros Oficiales */
	Route::get('libros-oficiales', 'LibrosOficialesController@librosOficiales')->name('librosOficiales');
	
	/* Impuestos */
	Route::get('impuestos', 'ImpuestosController@impuestos')->name('impuestos');
	
	
	
	/* ----------------- */
	/* Buscador ExtraBar */
	/* ----------------- */
	Route::get('buscadorExtraBar', function(){
		return view('includes.complementos.buscadorExtraBar');
	})->name('buscadorExtraBar');
	
	/* ------- */
	/* SIDEBAR */
	/* ------- */
	Route::get('menu_plegado/{plegado}','GeneralController@menuPlegado')->name('menu_plegado');
	
});

/* ------ */
/* IDIOMA */
/* ------ */
Route::get('lang/{lang}', function($lang){
	Session::put('lang', $lang);
	return Redirect::back();
})->middleware('web')->name('change_lang');
