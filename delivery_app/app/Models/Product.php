<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'price',
        'description',
        'image'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }
    public function businesses(){
        return $this->belongsToMany(Business::class,'product_businesses')->withPivot('price','availability')->withTimestamps();
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }
}
