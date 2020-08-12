<?php
namespace App\Http\Middleware;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Tablas\UserAjuste;

class ConectaUsuarioDB
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
			$port = Auth::user()->puertoDB; // 1433
			$username = Auth::user()->usuarioDB; // sa
			$password = Auth::user()->passwordDB; // AlexJimenez2007.*
			// Conexión Suite Net
			config(['database.connections.sqlsrv1.driver' => 'sqlsrv']);
			config(['database.connections.sqlsrv1.host' => $host]);
			config(['database.connections.sqlsrv1.port' => $port]);
			config(['database.connections.sqlsrv1.database' => 'SUITE_NET']);
			config(['database.connections.sqlsrv1.username' => $username]);
			config(['database.connections.sqlsrv1.password' => $password]);
			//.
			/* Comprobar si hay ajustes para el usuario */
			$ajuste = UserAjuste::where('id_user',$idUsuario)->get();
			$hayAjustes = $ajuste->count();
			if(!$hayAjustes){
				$userAjuste = new UserAjuste;
				$userAjuste->id_user = $idUsuario;
				$userAjuste->save();
			}
		}
        return $next($request);
    }
}
