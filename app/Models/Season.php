<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $table = 'seasons';

    public function patterns()
    {
        return $this->hasMany(Pattern::class);
    }

    public function tires()
    {
        return $this->hasManyThrough(Tire::class, Pattern::class);
    }

    public function to_mk($season)
    {
        switch ($season) {
            case 'Winter':
                return 'Зимски';
                break;
            case 'Summer':
                return 'Летни';
                break;
            case 'All Season':
                return 'Сите Сезони';
                break;
        }
    }
}
