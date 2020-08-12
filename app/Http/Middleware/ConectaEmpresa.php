<?php
namespace App\Http\Middleware;
use App\Providers\RouteServiceProvider;
use Closure;
use Auth;
use DB;
use Session;
use App\Tablas\UserAjuste;

class ConectaEmpresa
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
			$host = Auth::user()->instanciaDB;
			$port = Auth::user()->puertoDB;
			$username = Auth::user()->usuarioDB;
			$password = Auth::user()->passwordDB;
			
			/* Consultar ajustes para el usuario */
			$ajuste = UserAjuste::where('id_user',$idUsuario)->first();
			$empresa = $ajuste->ultimaEmpresa;
			$ejercicio = $ajuste->ultimoEjercicio;
			
			/* Si no tienen valor, reemplazar empresa por la última a la que tiene permiso */
			if(!$empresa){
				$empresa = DB::connection('sqlsrv1')->table('USUARIOSAPPEMPRESAS')->where('USUARIO', $idUsuario)->first()->EMPRESA;
			}
			/* Nombre empresa */
			$datosEmpresa = DB::connection('sqlsrv1')->table('EMP')->where('MENUMEMPRESA', $empresa)->first();
			Session::flash('datosEmpresa', $datosEmpresa);
			/* Si no tienen valor, reemplazar ejercicio por año actual */
			if(!$ejercicio){
				$ejercicio = date('Y');
			}
			// Conexión Empresa
			config(['database.connections.sqlsrv2.driver' => 'sqlsrv']);
			config(['database.connections.sqlsrv2.host' => $host]);
			config(['database.connections.sqlsrv2.port' => $port]);
			config(['database.connections.sqlsrv2.database' => 'EMPRESA_'.$empresa]);
			config(['database.connections.sqlsrv2.username' => $username]);
			config(['database.connections.sqlsrv2.password' => $password]);
			//.
		
		}
        return $next($request);
    }
}
