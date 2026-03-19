<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Cek apakah user ada (sudah login) DAN apakah rolenya sesuai
        if (!$request->user() || !in_array($request->user()->role, $roles)) {
            abort(403, 'Kamu tidak punya akses ke halaman ini!');
        }

        // TAMBAHKAN BARIS INI:
        return $next($request);
    }
}
