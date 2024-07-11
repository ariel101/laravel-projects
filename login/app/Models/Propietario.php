<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
        'apellidos',
        'ci'
    ];
    public function mascotas(){
        return $this->hasMany(Mascotas::class);
    }
}
