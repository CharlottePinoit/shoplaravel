<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //méthode pour la page d'acceuil
    public function home()
    {
        $urlProduit = route('product.show', ['id' => 1]);
        return "Bienvenue au Magasin Général de Pierre! Voir le produit: $urlProduit";
    }
    //méthode pour la page a propos
    public function about()
    {
        return 'Magasin général de Pierre, votre boutique de proximité!';
    }
}
