<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //méthode pour la page d'acceuil
    /*public function home()
    {
        $urlProduit = route('product.show', ['id' => 1]);
        return "Bienvenue au Magasin Général de Pierre! Voir le produit: $urlProduit";
    }*/
    //nouvelle fonction home partie 2
    public function home()
    {
        //création d'un tableau associatif avec des infos sur la boutique
        $boutique = [
            'nom' => 'Magasin général de Pierre',
            'produits' => 10,
            'etat' => 'ouvert'
        ];

        return view('home', compact('boutique')); //retourne la vue de "home.blade.php" et on passe le tableau à la vue
    }
    //méthode pour la page a propos
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
}
