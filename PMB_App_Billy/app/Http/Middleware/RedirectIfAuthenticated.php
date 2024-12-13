<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // If the user is authenticated
        if (Auth::check() && !in_array($user->role, $roles)) {
            if ($user->role === 'admin') {
                return redirect()->route('adminui.dashboard');
            } elseif ($user->role === 'mahasiswa') {
                return redirect()->route('userui.dashboard');
            }
        }

        return $next($request);
    }
}
