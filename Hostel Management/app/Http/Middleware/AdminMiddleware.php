<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Auth;
class AdminMiddleware
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
        if(!Auth::check()){
            return redirect()->route('login');
        }
        if($request->user() && $request->user()->role != 1){
            return new Response(view('errors.unauthorized')->with('role','ADMIN'));
        }
        return $next($request);
    }
}
