<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Auth;

class MemberMiddleware
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
        if($request->user() && $request->user()->role == 1){
            return redirect()->route('admindashboard');
        } 
        if($request->user() && $request->user()->role == 0){
            return redirect()->route('masterdashboard');
        }   
        return $next($request);
    }
}
