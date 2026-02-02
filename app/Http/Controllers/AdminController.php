<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //méthode pour le tableau de bord
    public function dashboard()
    {
        return 'Bienvenue dans le tableau de bord admin!';
    }

    //méthode pour la liste des utilisateurs
    public function users()
    {
        return 'Liste des utilisateurs';
    }
}
