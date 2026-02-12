<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
       
    public function index()
    {
        // Récupération des statistiques
        $productsCount = Product::count();
        $categoriesCount = Category::count();
        $usersCount = User::count();

        // Tu peux ajouter d'autres stats si besoin (ex: commandes, ventes, etc.)

        return view('admin.dashboard', compact(
            'productsCount',
            'categoriesCount',
            'usersCount'
        ));
    }
}
