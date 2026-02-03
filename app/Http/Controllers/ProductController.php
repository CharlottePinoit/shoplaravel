<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //méthode pour afficher les détails d'un produit
    public function show($id)
    {
        return "détails du produit n°$id";
    }
    public function index()
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Poule marron',
                'price' => 800,
                'image' => 'brown_chicken.png'
            ],
            [
                'id' => 2,
                'name' => 'Graines de Chou-fleur',
                'price' => 80,
                'image' => 'graine_choufleur.png'
            ],
            [
                'id' => 3,
                'name' => 'Pioche en Cuivre',
                'price' => 2000,
                'image' => 'pioche_cuivre.png'
            ],
            [
                'id' => 4,
                'name' => 'Chapeau de Cowboy',
                'price' => 10000,
                'image' => 'chapeau_cowboy.png'
            ],
            [
                'id' => 5,
                'name' => 'Salade du jardin',
                'price' => 110,
                'image' => 'salade.png'
            ],
        ];

        return view('products.index', compact('products'));
    }
}
