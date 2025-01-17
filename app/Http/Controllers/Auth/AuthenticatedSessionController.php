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
        $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);


    return back()->withErrors([
        'email' => 'Les informations fournies sont incorrectes.',
    ]);
    }
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    $role = $request->role;

    if ($role === 'admin' && Auth::guard('admin')->attempt($credentials)) {
        return redirect()->route('admin.stocks');
    }

    if ($role === 'responsable' && Auth::guard('responsable')->attempt($credentials)) {
        return redirect()->route('responsable.stocks');
    }

    return back()->withErrors(['email' => 'Invalid credentials or role.']);
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
