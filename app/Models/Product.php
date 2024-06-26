<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'description'];


    public function cartItems() : HasMany
    {
        return $this->hasMany(Cart::class);
    }
}
