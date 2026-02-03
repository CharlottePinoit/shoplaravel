<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Magasin général de Pierre')</title>
</head>

<body>


    <header>
        <nav style="display:flex; gap:10px; align-items:center;">
            <a href="{{ route('home') }}">Accueil</a>
            <a href="{{ route('about') }}">À propos</a>
            <a href="{{ route('products.index') }}">Nos Produits</a>

            @auth
            <span>Bonjour {{ auth()->user()->name }} !</span>
            <a href="{{ route('profile') }}">Mon profil</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Déconnexion</button>
            </form>
            @endauth

            @guest
            <a href="{{ route('login') }}">Connexion</a>
            <a href="{{ route('register') }}">Inscription</a>
            @endguest
        </nav>
    </header>

    <h1>@yield('page_title', 'Bienvenue au Magasin général de Pierre')</h1>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} ShopLaravel - Tous droits réservés
    </footer>

</body>

</html>