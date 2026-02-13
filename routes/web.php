<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\OrderController;


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
/* route::prefix('admin')
    ->name('admin')
    ->group(function () {
        //route tableau de bord
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        //route liste des utilisateurs
        Route::get('/users', [AdminController::class, 'users'])->name('users');
    }); */
//bonus parti 1
Route::resource('categories', CategoryController::class);
//pas de / devant categories
//car ici laravel génère automatiquement les routes du CRUD pour la ressource "categories" en ajoutant lui même le /devant

//partie 8 protection des routes admins avant séparation des controllers
/* Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('products', ProductController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
});
//partie 5 exo 1 crud de products
Route::resource('products', ProductController::class)->except(['create', 'store', 'edit', 'update', 'destroy']); */

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

//partie 8 des Admins après séparation des controllers
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('products', AdminProductController::class);

        Route::resource('categories', AdminCategoryController::class);

        Route::resource('users', AdminUserController::class);
    });

// Routes front produits
Route::resource('products', ProductController::class)->only(['index', 'show']);
// Routes front categories
Route::resource('categories', CategoryController::class)->only(['index', 'show']);

//Partie 9 commandes
Route::middleware('auth')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
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
