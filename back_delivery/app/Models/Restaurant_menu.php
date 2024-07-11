<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant_menu extends Model
{
    use HasFactory;
    protected $fillable =[
        'menu_id',
        'restaurant_id'
    ];

    public function order_details(){
        return $this->hasMany(Order_detail::class);
    }

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    public function menu(){
        return $this->belongsTo(Menu::class);
    }
}
