<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Client extends Authenticatable implements JWTSubject
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'phone_number',
        'address'
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

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    /**
     * Devuelve el identificador que se almacenará en el token JWT.
     */
    public function getJWTIdentifier()
    {
        Log::info('Client ID:', ['id' => $this->getKey()]);
        return $this->getKey(); // Devuelve el ID del cliente
    }

    /**
     * Devuelve un array de claims personalizados para el token JWT.
     */
    public function getJWTCustomClaims()
    {
        return []; // Personaliza aquí si necesitas incluir más datos
    }
}
