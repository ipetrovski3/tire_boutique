<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;


    public function invoicables()
    {
        return $this->morphedByMany(get_class($this->invoicable_type), 'invoicable');

    }


//    public function add_to_invoice($creatable, $product)
//    {
//        $this->invoicables()->make([''])
//    }


}
