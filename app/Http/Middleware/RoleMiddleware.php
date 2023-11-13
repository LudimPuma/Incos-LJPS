<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (! $request->user() || ! $request->user()->hasRole(...$roles)) {
            abort(403); // O redirecciona a una página de acceso no autorizado
        }

        return $next($request);
    }

}
