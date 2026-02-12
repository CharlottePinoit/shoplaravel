@extends('layouts.admin')

@section('title', 'Produits - Admin')

@section('content')

    <h1>Gestion des Produits</h1>


    <div style="text-align: center; margin-bottom: 20px;">
        <a href="{{ route('admin.products.create') }}" class="stardew-button">
            + Ajouter un produit
        </a>
    </div>


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


    <div class="grid grid-cols-3 gap-4" style="display:flex; flex-wrap:wrap; justify-content:center;">
        @foreach ($products as $product)
            <div class="product-card">
                <img src="{{ asset('images/' . ($product->image ?? 'placeholder.png')) }}" alt="{{ $product->name }}"
                    class="product-image">

                <div class="product-name">{{ $product->name }}</div>
                <div class="product-price">{{ number_format($product->price, 2, ',', ' ') }} €</div>
                <div>
                    Stock : {{ $product->stock }}
                </div>
                <div style="margin-top:10px;">
                    <a href="{{ route('admin.products.edit', $product) }}" class="stardew-button">Modifier</a>

                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button"
                            onclick="return confirm('Voulez-vous vraiment supprimer ce produit ?')">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

@endsection
