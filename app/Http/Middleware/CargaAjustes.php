<?php
namespace App\Http\Middleware;
use App\Providers\RouteServiceProvider;
use Closure;
use Auth;
use DB;
use Session;
use App\Tablas\UserAjuste;
use App\Tablas\Empresa;

class CargaAjustes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
		if(Auth::guard($guard)->check()){
			$idUsuario = Auth::user()->id;
			/* Listado de empresas del usuario */
			$empresa = new Empresa;
			$empresas = $empresa->empresasUsuario();
			Session::put("listadoEmpresas",$empresas);
			/* Ajustes de Usuario */
			$usuarioAjuste = UserAjuste::where('id',$idUsuario)->first();
			/* Columnas visibles en Clientes */
			Session::put("columnasClientes",$usuarioAjuste->columnasClientes);
			/* Columnas visibles en Proveedores */
			Session::put("columnasProveedores",$usuarioAjuste->columnasProveedores);
		}
        return $next($request);
    }
}
