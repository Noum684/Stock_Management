<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        if ($role === 'admin' && $user instanceof \App\Models\User) {
            return $next($request);
        }

        if ($role === 'responsable' && $user instanceof \App\Models\Responsable) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
