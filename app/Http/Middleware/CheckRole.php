<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {

        if (!Auth::user()) {
            return redirect('/login');
        }

        else if (! $request->user()->obtenerRol($role)) {
            
        	return redirect('/');

            //return redirect('/Productos/create');
        }
      
            return $next($request);
   


    }
}

