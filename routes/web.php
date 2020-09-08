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
	
	/* -------------- */
	/* LINKS SIDE BAR */
	/* -------------- */
	
	/* Dashboard */
	Route::get('/', 'DashboardController@dashboard')->name('dashboard');

	/* Clientes */
	Route::get('clientes', 'ClientesController@clientes')->name('clientes');
		// Lista Clientes (Asíncrona)
		Route::get('listaClientes/{variables}', 'ClientesController@listaClientes')->name('listaClientes');
		Route::post('borra-clientes', 'ClientesController@borraClientes')->name('borraClientes');
		// Lista Clientes Mínima (Asíncrona)
		Route::get('listaClientesMin', 'ClientesController@listaClientesMin')->name('listaClientesMin');
	Route::get('cliente/{id}', 'ClientesController@formularioCliente')->name('cliente');
	Route::post('guarda-cliente/{id}', 'ClientesController@guardar')->name('guardaCliente');
		// Ver Cliente (Asíncrona)
		Route::get('verCliente/{id}', 'ClientesController@verCliente')->name('verCliente');
	
	/* Proveedores */
	Route::get('proveedores', 'ProveedoresController@proveedores')->name('proveedores');
		// Lista Proveedores (Asíncrona)
		Route::get('listaProveedores/{variables}', 'ProveedoresController@listaProveedores')->name('listaProveedores');
	Route::get('proveedor/{id}', 'ProveedoresController@formularioCliente')->name('proveedor');
		// Ver Proveedor (Asíncrona)
		Route::get('verProveedor/{id}', 'ProveedoresController@verProveedor')->name('verProveedor');
	
	/* Libros Oficiales */
	Route::get('libros-oficiales', 'LibrosOficialesController@librosOficiales')->name('librosOficiales');
		Route::get('libros-oficiales/{id}', 'LibrosOficialesController@libroOficial')->name('libroOficial');
	
	/* Impuestos */
	Route::get('impuestos', 'ImpuestosController@impuestos')->name('impuestos');
		Route::get('impuestos/{id}', 'ImpuestosController@impuestosFormulario')->name('impuestosFormulario');
	
	/* Utilidades */
	Route::get('utilidades', 'UtilidadesController@utilidades')->name('utilidades');
	
	/* ------------- */
	/* LINKS NAV BAR */
	/* ------------- */
	
	/* Configuracion */
	Route::get('configuracion', 'ConfiguracionController@configuracion')->name('configuracion');
	
	/* -------- */
	/* EXTRABAR */
	/* -------- */
	
	/* Incluir el Buscador en la ExtraBar */
	Route::get('buscadorExtraBar', function(){
		return view('includes.complementos.buscadorExtraBar');
	})->name('buscadorExtraBar');
	
	/* ----------------------------------- */
	/* CONFIGURACIÓN Y AJUSTES DE EMPRESAS */
	/* ----------------------------------- */
	
	/* Configuracion de empresa */
	Route::get('configuracion-empresa', 'EmpresasController@configuracion')->name('configuracionEmpresa');
		// Lista Delegaciones Mínima (Asíncrona)
		Route::get('listaDelegacionesMin', 'EmpresasController@listaDelegacionesMin')->name('listaDelegacionesMin');
	Route::post('guarda-empresa', 'EmpresasController@guardar')->name('guardaEmpresa');
	/* Nueva empresa */
	Route::get('nueva-empresa', 'EmpresasController@nuevaEmpresa')->name('nuevaEmpresa');
	
	/* ------- */
	/* AJUSTES */
	/* ------- */
	
	/* SideBar */
	Route::get('menu_plegado/{plegado}','AjustesController@menuPlegado')->name('menu_plegado');
	/* Ajustes de Usuario */
	Route::get('usuario_ajuste/{desde}/{valor}','AjustesController@usuarioAjuste')->name('usuario_ajuste');
	/* Columnas Visibles */
	Route::get('columnas_visibles/{desde}/{columnas}','AjustesController@columnasVisibles')->name('columnas_visibles');
	
});

/* ------ */
/* IDIOMA */
/* ------ */

Route::get('lang/{lang}', function($lang){
	Session::put('lang', $lang);
	return Redirect::back();
})->middleware('web')->name('change_lang');
