<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tire extends Model
{
    use HasFactory;

    protected $fillable = ['code'];
    protected $table = 'tires';

    public static function stock()
    {
        return Tire::where('stock', '>', 0);
    }

    public function main_category()
    {
        return $this->belongsTo(MainCategory::class);
    }

    public function pattern()
    {
        return $this->belongsTo(Pattern::class);
    }

    public function brand()
    {
        return $this->pattern->brand;
    }

    public function category()
    {
        return $this->pattern->category;
    }

    public function dimension()
    {
        return $this->width . '/' . $this->height . 'R' . $this->diameter;
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function invoices()
    {
        return $this->morphToMany(Invoice::class, 'invoicable');
    }


    public function name()
    {
        return $this->dimension() . ' '
            . $this->brand()->name . ' '
            . $this->pattern->name . ' '
            . $this->speed_index . ' '
            . $this->load_index;
    }
}
