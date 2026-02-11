<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //méthode pour afficher les détails d'un produit

    public function index()
    {
        $products = Product::with('category')->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //on valide d'abord les données envoyées par le formulaire
        $validated = $request->validate(
            [
                'category_id' => 'required|exists:categories,id',
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'image' => 'nullable|string|max:255',
                'stock' => 'required|integer|min:0',
                'active' => 'sometimes|boolean',
            ],
            [
                'category_id.required' => 'Vous devez choisir une catégorie.',
                'name.required' => 'Le nom du produit est obligatoire.',
                'description.required' => 'La description est obligatoire.',
                'price.required' => 'Le prix est obligatoire.',
                'price.numeric' => 'Le prix doit être un nombre, sans espace.',
                'image.required' => 'Vous devez indiquer le nom de l’image.',
                'stock.required' => 'Le stock est obligatoire.',
            ],
        );
        $validated['active'] = $request->has('active'); //permet de gérer la checkbox active
        //on crée le produit en BDD
        Product::create($validated);
        //on redirige vers la liste des produits avec un message de succès
        return redirect()->route('products.index')->with('success', 'Produit créé avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|string|max:255',
        ]);

        $validated['active'] = $request->has('active'); //permet de gérer la checkbox active

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Produit modifié avec succès !');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès !');
    }
}
