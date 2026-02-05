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
     * Affiche le formulaire de connexion
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Traite la demande de connexion de l'utilisateur
     * Authentifie l'utilisateur et régénère la session
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('task.index', absolute: false));
    }

    /**
     * Déconnecte l'utilisateur et détruit la session
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
