<?php

namespace Database\Seeders;

use App\Models\Width;
use Illuminate\Database\Seeder;

class WidthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(125, 325, 10) as $width) {
            $d = new Width;
            $d->width = $width;
            $d->save();
        }
    }
}
