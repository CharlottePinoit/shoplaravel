<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

//exo 1
Route::get('/hello', function () {
    return 'Hello Laravel!';
});
//exo 2 controller
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
