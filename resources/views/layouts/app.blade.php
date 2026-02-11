<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Magasin général de Pierre')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    <header>
        <nav class="navbar">
            <a href="{{ route('home') }}">Accueil</a>
            <a href="{{ route('about') }}">À propos</a>
            <a href="{{ route('products.index') }}">Nos Produits</a>
            @auth
                <span class="welcome-text">Bonjour {{ auth()->user()->name }} !</span>
                <a href="{{ route('profile') }}">Mon profil</a>
                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf
                    <button class="stardew-button" type="submit">Déconnexion</button>
                </form>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="stardew-button">Connexion</a>
                <a href="{{ route('register') }}" class="stardew-button">Inscription</a>
            @endguest
            <a href="{{ route('cart.index') }}" class="cart-link">
                <img src="{{ asset('images/panier.png') }}" alt="Panier" class="cart-icon">
                <span class="cart-count">{{ array_sum(session('cart', [])) }}</span>
            </a>
        </nav>
    </header>
    <div class="content-area">
        <h1>@yield('page_title', 'Bienvenue au Magasin général de Pierre')</h1>
        @if (session('success'))
            <div class="flash-message flash-success">{{ session('success') }} </div>
        @endif
        @if (session('error'))
            <div class="flash-message flash-error">{{ session('error') }} </div>
        @endif
        <main style="padding:20px; max-width:1200px; margin:0 auto;">
            @yield('content')
        </main>
    </div>

    <footer>&copy;
        {{ date('Y') }} ShopLaravel - Tous droits réservés
    </footer>
</body>

</html>
