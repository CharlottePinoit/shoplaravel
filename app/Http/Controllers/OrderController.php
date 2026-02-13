<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // Liste des commandes de l'utilisateur connecté
    public function index()
    {
        $orders = Auth::user()
            ->orders()
            ->with('items.product')
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    // Détail d'une commande
    public function show(Order $order)
    {
        // Sécurité : empêcher d'accéder aux commandes des autres
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load('items.product');

        return view('orders.show', compact('order'));
    }

    // Création de commande depuis le panier
    public function store()
    {
        $cart = session()->get('cart', []);

        // Vérifier panier non vide
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Votre panier est vide.');
        }

        // Récupérer produits depuis la BDD
        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get();

        if ($products->isEmpty()) {
            return redirect()->back()->with('error', 'Produits invalides.');
        }

        DB::transaction(function () use ($products, $cart) {

            $total = 0;

            //Calcul du total à partir des prix actuels BDD
            foreach ($products as $product) {
                $quantity = $cart[$product->id]['quantity'];
                $total += $product->price * $quantity;
            }

            //Création commande
            $order = Auth::user()->orders()->create([
                'total' => $total,
                'status' => 'pending'
            ]);

            // Création des lignes + décrément stock
            foreach ($products as $product) {

                $quantity = $cart[$product->id]['quantity'];

                $order->items()->create([
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'unit_price' => $product->price // prix figé
                ]);

                $product->decrement('stock', $quantity);
            }
        });

        // Vider le panier
        session()->forget('cart');

        return redirect()->route('orders.index')
            ->with('success', 'Commande validée avec succès.');
    }
}
