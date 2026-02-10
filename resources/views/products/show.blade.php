@extends('layouts.app')
@section('page_title', $product->name)
@section('content')

<p>{{$product->description}}</p>
@if($product->image)
<img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="max-width:300px;">
@endif
<p>Prix : {{$product->price}} g</p>
<p>Stock : {{$product->stock}}</p>
<p>Statut : {{$product->active ? 'Actif' : 'Inactif'   }}</p>

<a href="{{ route('products.index') }}">Retour à la liste des produits</a>
@endsection