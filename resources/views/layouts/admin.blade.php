<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Admin ShopLaravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <header>
        <div class="navbar">
            <span class="welcome-text">
                🎮 Admin Panel
            </span>

            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.products.index') }}">Produits</a>
            <a href="{{ route('admin.categories.index') }}">Catégories</a>
            <a href="{{ route('admin.users.index') }}">Utilisateurs</a>

            <a href="{{ route('products.index') }}">← Retour au site</a>

            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="stardew-button">
                    Déconnexion
                </button>
            </form>
        </div>
    </header>

    <main class="content-area">


        @if (session('success'))
            <div class="flash-message flash-success">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif

        @if (session('error'))
            <div class="flash-message flash-error">
                <strong>{{ session('error') }}</strong>
            </div>
        @endif

        @yield('content')

    </main>


    <footer>
        <p>⚒️ Interface d'administration - ShopLaravel</p>
    </footer>

</body>

</html>
