<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function resta_menus(){
        return $this->hasMany(Restaurant_menu::class);
    }

    public function categories(){
        return $this->hasMany(Category::class);
    }
}
