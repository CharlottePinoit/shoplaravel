<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //affiche le panier
    public function index()
    {
        //récupère le panier
        $cart = session()->get('cart', []);
        //charge les products depuis la BDD
        $products = Product::whereIn('id', array_keys($cart))->get();
        //ajoute la quantité à chaque produits
        foreach ($products as $product) {
            $product->quantity = $cart[$product->id];
        }
        //calcul le total
        $total = $products->sum(function ($product) {
            return $product->price * $product->quantity;
        });
        return view('cart.index', compact('products', 'total', 'cart'));
    }

    //ajouter un produit
    public function add(Product $product)
    {
        //récupere le panier depuis la session, ou crée un nouveau tableau si le panier n'existe pas
        $cart = session()->get('cart', []);
        if (isset($cart[$product->id])) {
            //si produit existe déjà, incrémente la quantité
            $cart[$product->id]++;
        } else {
            //sinon ajoute produit avec quantité 1
            $cart[$product->id] = 1;
        }
        //sauvegarde le panier dans la session
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produit ajouté au panier!');
    }

    //modifier la quantité d'un produit
    public function update(Request $request, Product $product)
    {
        // Validation de la quantité
        $request->validate([
            'quantity' => 'required|integer|min:0', //min 0 permet de retirer un produit par la quantité
        ]);

        $cart = session('cart', []);

        $quantity = $request->input('quantity');

        if ($quantity <= 0) {
            // Retirer le produit si quantité ≤ 0
            unset($cart[$product->id]);
        } else {
            // Mettre à jour la quantité
            $cart[$product->id] = $quantity;
        }

        // Sauvegarder le panier en session
        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', 'Panier mis à jour !');
    }

    //supprimer un produit du panier
    public function remove(Product $product)
    {
        $cart = session('cart', []);

        unset($cart[$product->id]);

        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', 'Produit retiré du panier !');
    }

    //vider le panier
    public function clear()
    {
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Le panier a été vidé !');
    }
}
