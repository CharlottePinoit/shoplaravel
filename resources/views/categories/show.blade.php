@extends('layouts.app')
@section('page_title', 'Catégorie : ' . $category->name)
@section('content')
    <h2>{{ $category->description ?? 'Pas de description disponible' }}</h2>
    <div class="products-list">
        @foreach ($products as $product)
            <x-product-card :id="$product->id" :name="$product->name" :price="$product->price" :image="$product->image" :category="$category" />
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="pagination">
        {{ $products->links() }}
    </div>
@endsection
