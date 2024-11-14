<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class isAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //dd('estas entrando al middleware');
        if (!Auth::check()) {
            return redirect()->route(route: 'home');
        }else{
            if(Auth::user()->role != 'admin'){
                return redirect()->route(route: 'home');
            }
        }
        return $next($request);
    }
}
