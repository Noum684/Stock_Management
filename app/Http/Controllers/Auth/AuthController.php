<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    $role = $request->role;

    if ($role === 'admin' && Auth::guard('admin')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('welcome');
    }

    if ($role === 'responsable' && Auth::guard('responsable')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('dashboards');
    }

    return back()->withErrors(['email' => 'Identifiants ou rôle incorrects.']);
}

    // Gestion de deconnexion multiple
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
