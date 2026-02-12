<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifie que l'utilisateur est connecté et admin
        if (!Auth::check() || !Auth::user()->is_admin) {
            // Redirige avec un message d'erreur
            return redirect('/')->with('error', 'Accès réservé aux administrateurs.');
        }

        // L'utilisateur est admin → continue la requête
        return $next($request);
    }
}
