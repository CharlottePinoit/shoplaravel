@extends('layouts.app')
@section('page_title', 'Modifier le produit')
@section('content')

    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')

        <!-- Nom -->
        <div>
            <label for="name">Nom</label><br>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}">
        </div>

        <!-- Description -->
        <div>
            <label for="description">Description</label><br>
            <textarea name="description" id="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <!-- Prix -->
        <div>
            <label for="price">Prix</label><br>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}">
        </div>

        <!-- Stock -->
        <div>
            <label for="stock">Stock</label><br>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}">
        </div>

        <!-- Actif -->
        <div>
            <label>
                <input type="checkbox" name="active" value="1" {{ old('active', $product->active) ? 'checked' : '' }}>
                Produit actif
            </label>
        </div>

        <!-- Image -->
        <div>
            <label for="image">Image</label><br>
            <input type="text" name="image" id="image" placeholder="ex: brown_chicken.png"
                value="{{ old('image', $product->image) }}">
        </div>

        <button type="submit">Mettre à jour</button>

    </form>
@endsection
