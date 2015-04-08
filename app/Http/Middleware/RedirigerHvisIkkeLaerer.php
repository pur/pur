<?php namespace Pur\Http\Middleware;

use Closure;

class RedirigerHvisIkkeLaerer {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if( ! $request->user()->erLaerer())
        {
            return redirect('/home')->withFlash('Ingen tilgang!'); //response('Unauthorized.', 401);
        }

        return $next($request);
	}

}
