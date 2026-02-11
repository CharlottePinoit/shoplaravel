@extends('layouts.app')

@section('content')
@section('page_title', 'Ajouter un produit')



<form class="stardew-form" method="POST" action="{{ route('products.store') }}">
    @csrf

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <!-- Catégorie -->
    <div>
        <label for="category_id">Catégorie :</label><br>
        <select name="category_id" id="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>


    <!-- Nom -->
    <div>
        <label for="name">Nom :</label><br>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>


    <!-- Description -->
    <div>
        <label for="description">Description :</label><br>
        <textarea name="description" id="description">{{ old('description') }}</textarea>
        @error('description')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>


    <!-- Prix -->
    <div>
        <label for="price">Prix :</label><br>
        <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}">
        @error('price')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>


    <!-- Stock -->
    <div>
        <label for="stock">Stock :</label><br>
        <input type="number" name="stock" id="stock" value="{{ old('stock') }}">
        @error('stock')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>


    <!-- Active -->
    <div>
        <label>
            <input type="checkbox" name="active" value="1" {{ old('active', 1) ? 'checked' : '' }}>
            Produit actif
        </label>
        @error('active')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>


    <!-- Image (nom du fichier dans public/images) -->
    <div>
        <label for="image">Nom de l'image :</label><br>
        <input type="text" name="image" id="image" placeholder="ex: brown_chicken.png"
            value="{{ old('image') }}">
        <small>Indiquez le nom exact du fichier présent dans public/images</small>
        @error('image')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>


    <!-- Bouton -->
    <button type="submit">Créer le produit</button>
</form>
@endsection
