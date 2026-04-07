<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      if (!Auth::check() || !Auth::user()->esAdministrador()) {
         abort(403, 'No tienes permiso para acceder a esta sección.');
      }

      return $next($request);
    }
}
