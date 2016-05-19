<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class AutorizacaoMiddleware {

	public function handle($request, Closure $next){
		if((!$request->is('/') && !$request->is('logar')) && 
			!$request->is('reset_senha') && !$request->is('send_link') && 
			!$request->is('alt_senha') && Auth::guest()){
			return redirect('/');
		}

		return $next($request);
	}

}
