<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class Bodega
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

        if (!Auth::user()) {
            return redirect('/login');
        }
        
        else if (Auth::user()->tieneRol()->first() != 'bodega') {
            
            return redirect('/');
        }

        return $next($request);
    }
}
