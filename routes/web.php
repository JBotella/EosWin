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

Route::get('/', function () {
    return view('pages.dashboard');
})->name('dashboard');



Route::get('/home', 'HomeController@index')->name('home');

Route::get('lang/{lang}', function($lang) {
  \Session::put('lang', $lang);
  return \Redirect::back();
})->middleware('web')->name('change_lang');

/* ------- */
/* SIDEBAR */
/* ------- */
Route::get('menu_plegado/{plegado}','GeneralController@menuPlegado')->name('menu_plegado');
