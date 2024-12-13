<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            if ($user->role === 'mahasiswa') {
                if ($user->is_verified == 0) {
                    Auth::logout();  
                    return redirect('login')->with('error', 'Akun anda belum diverifikasi. Segera hubungi admin untuk melakukan verifikasi akun');
                }

                $request->session()->regenerate();  
                return redirect()->route('userui.dashboard');
            }

            $request->session()->regenerate();
            return redirect()->route('adminui.dashboard');
        }

        return back()->with('error', 'Username/Password Salah!');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
