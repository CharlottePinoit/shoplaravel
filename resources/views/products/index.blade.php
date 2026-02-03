@extends('layouts.app')
@section('title', 'Nos produits - ')
@section('content')


<h1>Nos produits</h1>{{-- @extends('layouts.app')--}}

<ul>
    @forelse($products as $product)
    <li>
        {{ $product['name'] }} — {{ $product['price'] }}g
        <img
            src="{{ asset('images/' . $product['image']) }}"
            alt="{{ $product['name'] }}"
            width="100">
    </li>
    @empty
    <li>Aucun produit disponible.</li>
    @endforelse
</ul>
@endsection