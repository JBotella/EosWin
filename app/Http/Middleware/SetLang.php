<?php
namespace App\Http\Middleware;
use Closure;
use Auth;
use Session;
use App;
use App\Tablas\UserAjuste;

class SetLang
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
			$usuarioAjuste = UserAjuste::where('id',$idUsuario)->first();
			if(!Session::has("lang")){
				$lang = $usuarioAjuste->idioma;
				Session::put('lang', $lang);
			}else{
				$lang = Session::get("lang");
				$usuarioAjuste->idioma = $lang;
				$usuarioAjuste->save();
			}
		}else{
			$lang = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
			if($lang != 'es' && $lang != 'en'){
				$lang = 'en';
			}
		}
		App::setLocale($lang);
		return $next($request);
	}
}
