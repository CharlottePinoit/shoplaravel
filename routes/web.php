<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;

//partie 1
//exo 1
Route::get('/hello', function () {
    return 'Hello Laravel!';
});
//exo 2 controller
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
// plus besoin car dans le resource product
//Route::get('/products', [ProductController::class, 'index'])->name('products.index');
//Route::get('/products/{product}', [ProductController::class, 'show'])->name('product.show')->whereNumber('product'); //n'accepte que des nombres
//bonus partie 1
route::prefix('admin')
    ->name('admin')
    ->group(function () {
        //route tableau de bord
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        //route liste des utilisateurs
        Route::get('/users', [AdminController::class, 'users'])->name('users');
    });
//bonus parti 1
Route::resource('categories', CategoryController::class);
//pas de / devant categories
//car ici laravel génère automatiquement les routes du CRUD pour la ressource "categories" en ajoutant lui même le /devant

//partie 5 exo 1 crud de products
Route::resource('products', ProductController::class);

//bonus partie 2 message personnalisé si authentifié
Route::middleware('guest')->group(function () {
    //formulaire d'inscription
    Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    //formulaire de connexion
    Route::get('/login', [LoginController::class, 'showForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

//Route de déconnexion accessible uniquement aux utilisateurs connectés
Route::post('/logout', [LogoutController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

//Partie 7 panier
Route::middleware('auth')
    ->prefix('cart')
    ->name('cart.')
    ->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add/{product}', [CartController::class, 'add'])->name('add');
        Route::patch('/update/{product}', [CartController::class, 'update'])->name('update');
        Route::delete('/remove/{product}', [CartController::class, 'remove'])->name('remove');
        Route::delete('/clear', [CartController::class, 'clear'])->name('clear');
    });

// !!à mettre en tout dernier!!
//route fallback pour les pages non trouvées 404
Route::fallback(function () {
    return '
        <h1><img src="/images/point_exclamation.png" alt="Page 404" style="max-width:400px;">Page non trouvée !</h1>
        <p>Vous allez être redirigé vers l\'accueil dans 5 secondes...</p>
        <a href="/">Cliquez ici si la redirection ne fonctionne pas</a>
        <meta http-equiv="refresh" content="5;url=/">
    ';
});
