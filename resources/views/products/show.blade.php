@extends('layouts.app')
@section('page_title', $product->name)
@section('content')

    <p>{{ $product->description }}</p>
    @if ($product->image)
        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="max-width:300px;">
    @endif
    <p>Prix : {{ $product->price }} g</p>
    <p>Stock : {{ $product->stock }}</p>
    <p>Statut : {{ $product->active ? 'Actif' : 'Inactif' }}</p>
    <p>Catégorie : {{ $product->category->name ?? 'Aucune' }}</p>

    {{-- Bouton pour voir les autres produits de la même catégorie --}}
    @if ($product->category)
        <a href="{{ route('categories.show', $product->category->id) }}" class="product-link">
            Voir les autres produits de cette catégorie
        </a>
    @endif

    <a href="{{ route('products.index') }}" class="stardew-button">
        Retour à la liste des produits
    </a>
@endsection
