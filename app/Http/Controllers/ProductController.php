<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //méthode pour afficher les détails d'un produit
    public function show(Product $product)
    {

        return view('products.show', compact('product'));
    }
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }
}
