<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

//partie 1
//exo 1
Route::get('/hello', function () {
    return 'Hello Laravel!';
});
//exo 2 controller
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show')->whereNumber('id'); //n'accepte que des nombres
//bonus partie 1
route::prefix('admin')->name('admin')->group(function () {
    //route tableau de bord
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    //route liste des utilisateurs
    Route::get('/users', [AdminController::class, 'users'])->name('users');
});
//bonus parti 1
Route::resource('categories', CategoryController::class);
//pas de / devant categories
//car ici laravel génère automatiquement les routes du CRUD pour la ressource "categories" en ajoutant lui même le /devant



// !!à mettre en tout dernier!!
//route fallback pour les pages non trouvées 404
Route::fallback(function () {
    return '
        <h1><img src="/images/point_exclamation.png" alt="Page 404" style="max-width:400px;">Page non trouvée !</h1>
        <p>Vous allez être redirigé vers l\'accueil dans 5 secondes...</p>
        <a href="/">Cliquez ici si la redirection ne fonctionne pas</a>
        <meta http-equiv="refresh" content="5;url=/home">
    ';
});
