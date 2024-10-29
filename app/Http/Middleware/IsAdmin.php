<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
{
    \Log::info('Verificando acesso de admin...');

    if (Auth::check()) {
        \Log::info('Usuário autenticado: ' . Auth::user()->email);

        if (Auth::user()->access_level == 1) {
            return $next($request);
        } else {
            \Log::info('Acesso negado: nível de acesso ' . Auth::user()->access_level);
        }
    } else {
        \Log::info('Usuário não autenticado.');
    }

    return redirect()->route('home')->with('error', 'Acesso negado.');
}


}
