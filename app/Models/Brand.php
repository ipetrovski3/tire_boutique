<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    public function patterns()
    {
        return $this->hasMany(Pattern::class);
    }

    public function tires()
    {
        return $this->hasManyThrough(Tire::class, Pattern::class);
    }

}
