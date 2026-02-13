@extends('layouts.app')
@section('title', 'Commande #{{ $order->id }}


@section('page_title', 'Commande #{{ $order->id }}

@section('content')


<p>Total : {{ $order->total }} €</p>
<p>Statut : {{ $order->status }}</p>

<h3>Produits :</h3>

@foreach($order->items as $item)
<div>
    <p>{{ $item->product->name }}</p>
    <p>Quantité : {{ $item->quantity }}</p>
    <p>Prix unitaire : {{ $item->unit_price }} €</p>
</div>
@endforeach

@endsection