<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total', 'status'];

    //une commande appartient à 1 utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //1 commande a plusieurs produits
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
