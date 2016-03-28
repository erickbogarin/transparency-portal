<?php

namespace portal\Http\Middleware;

use Closure;

use Auth;

class Authenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( ($request->is('transparencias') || $request->is('users')) && Auth::guest()) {
            return redirect('/auth/login');
        }   
        return $next($request);
    }
}
