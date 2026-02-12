<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    // Affiche le formulaire d'inscription
    public function showForm()
    {
        return view('auth.register');
    }
    // Traite l'inscription
    public function register(Request $request)
    {
        //Validation
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // vérifie password_confirmation
        ]);

        //Création de l'utilisateur
        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        //Connexion automatique
        Auth::login($user);

        //Redirection avec message flash
        return redirect()->route('home')->with('success', 'Bienvenue ! Votre compte a été créé.');
    }
}
