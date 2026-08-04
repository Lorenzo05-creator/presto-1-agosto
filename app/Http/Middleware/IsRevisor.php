<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsRevisor
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_revisor) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Accesso non autorizzato');
    }
}
