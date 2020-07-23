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
	Route::get('/', function(){ return view('pages.dashboard'); })->name('dashboard');

	/* Clientes */
	Route::get('clientes', 'ClientesController@clientes')->name('clientes');
		// Lista Clientes (Asíncrona)
		Route::get('listaClientes', 'ClientesController@listaClientes')->name('listaClientes');
	Route::get('cliente/{id}', 'ClientesController@cliente')->name('cliente');
});


//Route::get('/home', 'HomeController@index')->name('home');

Route::get('lang/{lang}', function($lang) {
  \Session::put('lang', $lang);
  return \Redirect::back();
})->middleware('web')->name('change_lang');

/* ------- */
/* SIDEBAR */
/* ------- */
Route::get('menu_plegado/{plegado}','GeneralController@menuPlegado')->name('menu_plegado');
