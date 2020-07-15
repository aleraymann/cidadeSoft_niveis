<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $local = $request['local'];
        //dd($local);
        if (Auth::guard($guard)->check()) {
           if( $local == "D"){
           return redirect('/Dashboard');
           } else if( $local == "P"){
            return redirect('/pdv');
           }
        } 

        return $next($request);
    }
}
