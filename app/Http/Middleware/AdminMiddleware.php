<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
      $perfil = Auth::user()->perfil;
      if ($perfil->nombre !== 'Administrador' || $perfil->id !== 1) {
            abort(401, 'Unauthorized action.');
      }
      return $next($request);
    }
}
