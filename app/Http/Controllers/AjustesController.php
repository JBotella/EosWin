<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;

class AjustesController extends Controller
{
    /* ---------------------------------- */
	/* ---------- MENÚ SIDEBAR ---------- */
	/* ---------------------------------- */
	public static function menuPlegado($plegado){
		session::put("menuPlegado", $plegado);
	}
}
