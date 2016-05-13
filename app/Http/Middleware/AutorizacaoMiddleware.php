<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class AutorizacaoMiddleware {

	public function handle($request, Closure $next){
		if((!$request->is('/') && !$request->is('logar')) && Auth::guest()){
			return redirect('/');
		}

		return $next($request);
	}

}
