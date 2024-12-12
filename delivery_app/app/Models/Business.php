<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'business_type',
        'address',
        'phone_number',
        'opening',
        'closing',
        'average_rating'
    ];

    public function products(){
        return $this->belongsToMany(Product::class,'product_businesses')->withPivot('price','availability')->withTimestamps();
    }
}
