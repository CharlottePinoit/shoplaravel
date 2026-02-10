<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    // Colonnes autorisées pour l'assignation de masse
    protected $fillable = ['name', 'slug', 'description'];

    protected $hidden = [];

    protected $casts = [];

    //partie 6 : relation avec les produits
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
