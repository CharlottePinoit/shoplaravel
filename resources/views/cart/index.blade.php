@extends('layouts.app')
@section('page_title', 'Mon panier')
@section('content')

    @if (count($products) > 0)
        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Sous-total</th>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}g</td>

                        <td>
                            <form action="{{ route('cart.update', $product) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" value="{{ $cart[$product->id] }}" min="0">
                                <button type="submit">Mettre à jour</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('cart.remove', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">🗑️ Supprimer</button>
                            </form>
                        </td>
                        <td>{{ $product->price * $cart[$product->id] }}g</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3>Total : {{ $total }}g</h3>
        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Vider le panier</button>
        </form>
        <p>Total du panier : <strong>{{ $total }}g</strong></p>
    @else
        <p>Votre panier est vide.</p>
    @endif
@endsection
