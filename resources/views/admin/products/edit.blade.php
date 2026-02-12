@extends('layouts.admin')

@section('title', 'Modifier un produit - Admin')

@section('content')

    <h1>Modifier le produit : {{ $product->name }}</h1>

    {{-- Messages flash --}}
    @if (session('success'))
        <div class="flash-message flash-success">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    @if (session('error'))
        <div class="flash-message flash-error">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif

    {{-- Formulaire modification produit --}}
    <div class="stardew-form">

        <form action="{{ route('admin.products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Catégorie --}}
            <div>
                <label for="category_id">Catégorie</label>
                <select name="category_id" id="category_id">
                    <option value="">-- Choisir une catégorie --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            {{-- Nom --}}
            <div>
                <label for="name">Nom du produit</label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            {{-- Prix --}}
            <div>
                <label for="price">Prix (€)</label>
                <input type="number" step="0.01" min="0" id="price" name="price"
                    value="{{ old('price', $product->price) }}" required>
                @error('price')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            {{-- Stock --}}
            <div>
                <label for="stock">Stock</label>
                <input type="number" id="stock" name="stock" min="0"
                    value="{{ old('stock', $product->stock) }}" required>
                @error('stock')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            {{-- Image --}}
            <div>
                <label for="image">Nom du fichier image</label>
                <input type="text" id="image" name="image" value="{{ old('image', $product->image) }}">
                @error('image')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            {{-- Active --}}
            <div>
                <label>
                    <input type="checkbox" name="active" {{ old('active', $product->active) ? 'checked' : '' }}>
                    Actif
                </label>
            </div>

            <button type="submit" class="stardew-button">Modifier le produit</button>

        </form>

    </div>

@endsection
