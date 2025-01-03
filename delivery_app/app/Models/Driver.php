<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Driver extends Authenticatable implements JWTSubject
{
    use HasFactory, HasApiTokens, Notifiable;
    use HasRoles;
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'phone_number',
        'vehicle',
        'placa'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];
    
    protected $cast = [
        'email_verified_at' => 'datetime',
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function getJWTIdentifier()
    {
        //Log::info('Client ID:', ['id' => $this->getKey()]);
        return $this->getKey(); // Devuelve el ID del cliente
    }

    public function getJWTCustomClaims()
    {
        return []; // Personaliza aquí si necesitas incluir más datos
    }
}
