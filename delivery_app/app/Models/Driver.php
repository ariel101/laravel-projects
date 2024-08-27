<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'phone_number',
        'vehicle',
        'placa'
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
