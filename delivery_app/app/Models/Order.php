<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'driver_id',
        'delivery_address',
        'total_amount',
        'city',
        'status',
        'order_datetime',
        'delivery_datetime'
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function driver(){
        return $this->belongsTo(Driver::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
