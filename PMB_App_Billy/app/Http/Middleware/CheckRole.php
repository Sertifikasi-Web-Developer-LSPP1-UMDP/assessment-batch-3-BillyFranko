<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // If the user is not logged in, redirect to login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Check if the user has the required role
        if (!in_array($user->role, $roles)) {
            // Redirect to the appropriate dashboard depending on their role
            if ($user->role === 'admin') {
                return redirect()->route('adminui.dashboard');
            } elseif ($user->role === 'mahasiswa' && $user->is_verified == 1) {
                return redirect()->route('userui.dashboard');
            }else{
                return redirect()->route('login');
            }
        }

        // Allow access to the next request if role is correct
        return $next($request);
    }
}

