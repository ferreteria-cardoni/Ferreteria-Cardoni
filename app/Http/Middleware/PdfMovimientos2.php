<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class PdfMovimientos2
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
        else if (Auth::user()->tieneRol()->first() == 'gerente') {
            
            return $next($request);

        }
        else if (Auth::user()->tieneRol()->first() == 'bodega') {
            
            return $next($request);

        }
        else if (Auth::user()->tieneRol()->first() == 'ventas') {
            
            return $next($request);

        }

        return redirect('/');
    }
}
