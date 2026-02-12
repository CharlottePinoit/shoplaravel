<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        //Validation des données
        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'email.required' => 'L’adresse e-mail est obligatoire.',
                'email.email' => 'Veuillez entrer une adresse e-mail valide.',
                'password.required' => 'Le mot de passe est obligatoire.',
            ],
        );

        //Tentative de connexion
        $remember = $request->boolean('remember'); // coche "se souvenir de moi"
        if (Auth::attempt($credentials, $remember)) {
            //Connexion réussie → régénérer la session
            $request->session()->regenerate();

            //Rediriger vers la page précédente ou accueil
            return redirect()->intended('/')->with('success', 'Connexion réussie !');
        }

        //Échec → retour au formulaire avec erreur
        return back()
            ->withErrors([
                'email' => 'Ces identifiants ne correspondent pas à nos enregistrements.',
            ])
            ->onlyInput('email'); // conserve uniquement l'email
    }
}
