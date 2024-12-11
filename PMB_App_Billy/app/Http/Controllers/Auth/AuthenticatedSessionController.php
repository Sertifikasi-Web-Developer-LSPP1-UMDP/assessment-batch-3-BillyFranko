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
        $request->authenticate();
        $user = Auth::user();

        if($user->role === 'mahasiswa'){
            if ($user->status === 'unverified') {
                Auth::logout();
                
                return redirect('login')
                ->with('error', 'Akun anda belum diverifikasi');
            }else{
                $request->session()->regenerate();

                return redirect()->route('userui.dashboard');
            }
        }else{
            $request->session()->regenerate();

            return redirect()->route('adminui.dashboard');
        }
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