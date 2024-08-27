<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'driver_id',
        'delivery_address',
        'total_amount',
        'city',
        'status',
        'order_datetime',
        'delivery_datetime'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function driver(){
        return $this->belongsTo(Driver::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
