<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;

    public function tires()
    {
        return $this->hasMany(Tire::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
