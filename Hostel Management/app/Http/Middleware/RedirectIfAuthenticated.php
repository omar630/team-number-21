<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
        if (Auth::guard($guard)->check()) {  
            switch (Auth::user()->role) {
                case "0":
                    return  redirect('/master');
                    break;
                case "1":
                    return redirect('/admin');
                    break;            
                default:
                    return  redirect('/');
                    break;
            }    
        }

        return $next($request);
    }
}
