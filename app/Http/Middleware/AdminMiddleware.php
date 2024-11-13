<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica que el usuario esté autenticado y sea administrador
        if (auth()->check() && auth()->user()->role == 'admin') {
            return $next($request);  // Permite el acceso
        }

        // Si no es admin, redirige al login o a una página de acceso denegado
        return redirect()->route('login');  // O redirigir a una página personalizada
    }
}
