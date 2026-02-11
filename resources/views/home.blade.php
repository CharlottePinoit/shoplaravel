@extends('layouts.app')

@section('title', $boutique['nom'])

@section('page_title')
    Bienvenue au {{ $boutique['nom'] }} !
@endsection

@section('content')
    <div class="home-container" style="text-align: center; margin-top: 20px;">
        @auth
            <p>Bonjour <strong>{{ auth()->user()->name }}</strong> ! Ravi de vous revoir !</p>
            <p>Nous avons actuellement <strong>{{ $boutique['produits'] }}</strong> produits en stock.</p>
            <p>
                <a href="{{ route('products.index') }}" class="stardew-button">Voir nos produits</a>
                <a href="{{ route('cart.index') }}" class="stardew-button">Mon panier</a>
            </p>
        @else
            <p>Bienvenue ! Nous avons actuellement <strong>{{ $boutique['produits'] }}</strong> produits en stock.</p>
            <p>Pour profiter pleinement de la boutique, connectez-vous ou créez un compte :</p>
            <p>
                <a href="{{ route('login') }}" class="stardew-button">Connexion</a>
                <a href="{{ route('register') }}" class="stardew-button">Inscription</a>
            </p>
        @endauth

        {{-- Affichage de l'état de la boutique --}}
        @if ($boutique['etat'] === 'ouvert')
            <p>La boutique est ouverte, venez nous rendre visite !</p>
            <img src="{{ asset('images/boutique_ouverte.png') }}" alt="Boutique ouverte" style="max-width:300px;">
        @else
            <p>La boutique est fermée pour le moment, revenez plus tard.</p>
            <img src="{{ asset('images/boutique_fermee.png') }}" alt="Boutique fermée" style="max-width:300px;">
        @endif
    </div>
@endsection
