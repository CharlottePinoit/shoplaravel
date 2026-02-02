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
}
