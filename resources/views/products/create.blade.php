@extends('layouts.app')

@section('content')
@section('page_title', 'Ajouter un produit')



<form method="POST" action="{{ route('products.store') }}">
    @csrf

    <!-- Catégorie -->
    <div>
        <label for="category_id">Catégorie :</label><br>
        <select name="category_id" id="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Nom -->
    <div>
        <label for="name">Nom :</label><br>
        <input type="text" name="name" id="name">
    </div>

    <!-- Description -->
    <div>
        <label for="description">Description :</label><br>
        <textarea name="description" id="description"></textarea>
    </div>

    <!-- Prix -->
    <div>
        <label for="price">Prix :</label><br>
        <input type="number" step="0.01" name="price" id="price">
    </div>

    <!-- Stock -->
    <div>
        <label for="stock">Stock :</label><br>
        <input type="number" name="stock" id="stock">
    </div>

    <!-- Active -->
    <div>
        <label>
            <input type="checkbox" name="active" value="1" checked>
            Produit actif
        </label>
    </div>

    <!-- Image (nom du fichier dans public/images) -->
    <div>
        <label for="image">Nom de l'image :</label><br>
        <input type="text" name="image" id="image" placeholder="ex: brown_chicken.png">
        <small>Indiquez le nom exact du fichier présent dans public/images</small>
    </div>

    <!-- Bouton -->
    <button type="submit">Créer le produit</button>
</form>
@endsection
