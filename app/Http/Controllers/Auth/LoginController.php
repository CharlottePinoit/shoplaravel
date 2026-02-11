<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Affiche le formulaire de connexion
    public function showForm()
    {
        return view('auth.login');
    }

    // Traite la connexion
    public function login(Request $request)
    {
        // 1️⃣ Validation des données
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2️⃣ Tentative de connexion
        $remember = $request->boolean('remember'); // coche "se souvenir de moi"
        if (Auth::attempt($credentials, $remember)) {
            // 3️⃣ Connexion réussie → régénérer la session
            $request->session()->regenerate();

            // 4️⃣ Rediriger vers la page précédente ou accueil
            return redirect()->intended('/')->with('success', 'Connexion réussie !');
        }

        // 5️⃣ Échec → retour au formulaire avec erreur
        return back()
            ->withErrors([
                'email' => 'Ces identifiants ne correspondent pas à nos enregistrements.',
            ])
            ->onlyInput('email'); // conserve uniquement l'email
    }
}
