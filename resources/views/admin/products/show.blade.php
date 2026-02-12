@extends('layouts.admin')

@section('title', 'Détails du produit - Admin')

@section('content')

    <h1>Détails du produit : {{ $product->name }}</h1>

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

    <div class="product-card" style="width: 300px; margin: 20px auto;">
        {{-- Image --}}
        @if ($product->image)
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
        @endif

        {{-- Nom --}}
        <div class="product-name">{{ $product->name }}</div>

        {{-- Catégorie --}}
        <div><strong>Catégorie :</strong> {{ $product->category->name ?? 'Non définie' }}</div>

        {{-- Description --}}
        <div><strong>Description :</strong> {{ $product->description ?? 'Aucune description' }}</div>

        {{-- Prix --}}
        <div><strong>Prix :</strong> €{{ number_format($product->price, 2, ',', ' ') }}</div>

        {{-- Stock --}}
        <div><strong>Stock :</strong> {{ $product->stock }}</div>

        {{-- Actif --}}
        <div><strong>Actif :</strong> {{ $product->active ? 'Oui' : 'Non' }}</div>

        {{-- Boutons actions --}}
        <div style="margin-top: 10px;">
            <a href="{{ route('admin.products.edit', $product) }}" class="stardew-button">Modifier</a>

            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button"
                    onclick="return confirm('Supprimer ce produit ?')">Supprimer</button>
            </form>
        </div>
    </div>

    <a href="{{ route('admin.products.index') }}" class="stardew-button"
        style="display:block; text-align:center; margin-top:20px;">
        Retour à la liste
    </a>

@endsection
