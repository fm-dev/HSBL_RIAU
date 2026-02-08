<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('portal.admin.login');
        }

        $user = Auth::user();
        $roleId = (int)$user->role;

        // Check apakah roleId adalah 1 atau 2 (Super Admin atau Admin)
        if ($roleId !== 1 && $roleId !== 2 && $roleId !== 3) {
            return redirect('/');
        }

        return $next($request);
    }
}
