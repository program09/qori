<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     public function handle($request, Closure $next, $role)
     {
         if (Auth::check() && Auth::user()->role->nombre === $role) {
             return $next($request);
         } else {
             return abort(403, 'Acceso no autorizado000');
         }
     }
     
}
