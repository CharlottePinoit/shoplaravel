<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Magasin général de Pierre')</title>

<body>

    <header>
        <nav>
            <a href="{{ route('home') }}">Accueil</a> |
            <a href="{{ route('about') }}">À propos</a> |
            <a href="{{ route('products.index') }}">Nos Produits</a>
        </nav>
    </header>


    <main>
        @yield('content')
    </main>


    <footer>
        &copy; {{ date('Y') }} ShopLaravel - Tous droits réservés
    </footer>
</body>

</html>