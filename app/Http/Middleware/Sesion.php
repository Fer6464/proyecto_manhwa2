<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\http\Controllers\UsuariosController;

class Sesion
{
   public function handle(Request $request, Closure $next)
    {
        if (!session()->has('apodo')) {
            // Si no hay sesión, redirige a la ruta que llama al método create
            return redirect()->route('user.login');
        }

        return $next($request);
    }
}
