<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {

        if (! $request->user()->obtenerRol($role)) {
            
        	return redirect('/');

            //return redirect('/Productos/create');
        }
      
            return $next($request);
   


    }
}

