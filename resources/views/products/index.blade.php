@extends('layouts.app')
@section('title', 'Nos produits - ')


@section('page_title', 'Nos Produits')


@section('content')
    @auth
        @if (auth()->user()->is_admin)
            <a href="{{ route('admin.products.create') }}" class="product-link add-product-btn">
                + Ajouter un produit
            </a>
        @endif
    @endauth
    <div class="grid grid-cols-3 gap-4">
        @foreach ($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>

@endsection
