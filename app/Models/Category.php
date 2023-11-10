<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Todo;

class Category extends Model
{
    use HasFactory;

    //Relaciones - Relación uno a muchos
    public function todos(){
        return $this->hasMany(Todo::class);
    }
}
