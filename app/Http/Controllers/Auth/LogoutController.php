<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    // Déconnexion sécurisée
    public function logout(Request $request)
    {
        //Déconnecte l'utilisateur
        Auth::logout();

        //Invalide la session
        $request->session()->invalidate();

        //Régénère le token CSRF
        $request->session()->regenerateToken();

        // Redirection vers la page d'accueil avec message
        return redirect()->route('home')->with('success', 'Vous avez été déconnecté avec succès.');
    }
}
