@extends('layouts.app')
@section('title', 'Mes commandes')


@section('page_title', 'Mes commandes')

@section('content')
@foreach($orders as $order)
<div>
    <p>Commande #{{ $order->id }}</p>
    <p>Total : {{ $order->total }} €</p>
    <p>Statut : {{ $order->status }}</p>
    <a href="{{ route('orders.show', $order) }}">Voir détail</a>
</div>
@endforeach
@endsection