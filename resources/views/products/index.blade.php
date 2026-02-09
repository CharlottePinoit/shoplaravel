@extends('layouts.app')
@section('title', 'Nos produits - ')


@section('page_title', 'Nos Produits')

@section('content')
<div class="grid grid-cols-3 gap-4">
    @foreach($products as $product)
    <x-product-card
        :id="$product->id"
        :name="$product->name"
        :price="$product->price"
        :image="$product->image" />
    @endforeach
</div>
@endsection