<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'number'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order_details(){
        return $this->hasMany(Order_detail::class);
    }
}
