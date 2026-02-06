<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    // Colonnes autorisées pour l'assignation de masse
    protected $fillable = [
        'category_id',  // clé étrangère
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'active',
    ];

    protected $hidden = [];

    protected $casts = [
        'price' => 'decimal:2',
        'active' => 'boolean',
    ];
}
