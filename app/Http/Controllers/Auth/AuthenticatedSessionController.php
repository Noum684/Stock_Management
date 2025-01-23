<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateSessionController extends Controller
{
    /**
     * Forcer la déconnexion d'autres sessions actives
     */
    public function destroyOtherSessions(Request $request)
    {
        $user = Auth::user();

        Auth::logoutOtherDevices($request->password);

        return redirect()->route('dashboard')->with('success', 'Autres sessions déconnectées.');
    } 

    /**
     * Rafraîchir la session utilisateur
     */
    public function refreshSession(Request $request)
    {
        $request->session()->regenerate();
        return back()->with('success', 'Session actualisée.');
    }
}
