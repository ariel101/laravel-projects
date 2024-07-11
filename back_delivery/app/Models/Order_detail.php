<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant-menu_id',
        'order_id',
        'amount',
        'price'
    ];

    public function order(){
        return $this->belongsTo(Orders::class);
    }

    public function restaurant_menu(){
        return $this->belongsTo(Restaurant_menu::class);
    }
}
