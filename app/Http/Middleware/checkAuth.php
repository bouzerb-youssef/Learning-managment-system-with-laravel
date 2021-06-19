<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkAuth

{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       
       
        $role =Auth::user()->role ;

        if (   !$role == 1) {
            return response()->view('front.accuille');
           
       }
         
        return $next($request); 
    
    
       
       
    }
}
