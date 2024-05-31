<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($role === 'teacher' && str_ends_with($user->email, '@teacher.com')) {
            return $next($request);
        }

        if ($role === 'forebear' && str_ends_with($user->email, '@forebear.com')) {
            return $next($request);
        }

        if ($role === 'admin' && str_ends_with($user->email, '@admin.com')) {
            return $next($request);
        }

        return redirect('/login');
    }
}
