<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use App\Models\Category;

class Product extends Model
{
    // Colonnes autorisées pour l'assignation de masse
    protected $fillable = [
        'category_id', // clé étrangère
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'active',
        'image',
    ];

    protected $hidden = [];

    protected $casts = [
        'price' => 'decimal:2',
        'active' => 'boolean',
    ];

    public function setNameAttribute($value)
    {
        //avec gestion des doublons de slug
        $this->attributes['name'] = $value;

        // Création du slug initial
        $slug = Str::slug($value);

        // Vérifie si ce slug existe déjà dans la table
        $count = Product::where('slug', $slug)->count();

        // Si un produit avec ce slug existe, on ajoute un suffixe unique
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        $this->attributes['slug'] = $slug;
    }
    // partie 6 : relation avec la catégorie
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
