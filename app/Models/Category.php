<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function patterns()
    {
        return $this->hasMany(Pattern::class);
    }

    public function tires()
    {
        return $this->hasManyThrough(Tire::class, Brand::class);
    }

    public function to_mk($category)
    {
        switch ($category) {
            case 'car':
                return 'Патничkи';
                break;
            case 'van':
                return 'Комби';
                break;
            case 'suv':
                return 'Џип';
                break;
        }
    }
}
