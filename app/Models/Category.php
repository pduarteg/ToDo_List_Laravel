<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Todo;

class Category extends Model
{
    use HasFactory;

    public function tasks(){
        // con hasMany indicamos que puede tener muchos
        // objetos de la clase Todo
        return $this->hasMany(Todo::class);
    }
}
