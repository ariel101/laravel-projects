<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascotas extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
        'genero',
        'edad',
        'raza',
        'propietarioId',
        'direccion'
    ];

    public function propietarios(){
        return $this->belongsTo(Propietario::class);
    }
}
