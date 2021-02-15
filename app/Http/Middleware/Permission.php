<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Permission
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
        // dd("middleware");
        if(auth()->user()->cargo != 0)
        {
            flash('¡No puedes entrar aquí!')->error();
            return redirect()->route('dashboard')->with('message', 'No tienes permisos para entrar a esté sitio.');

        }else{
            return $next($request);
        }
    }
}
