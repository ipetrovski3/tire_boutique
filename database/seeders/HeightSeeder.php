<?php

namespace Database\Seeders;

use App\Models\Height;
use Illuminate\Database\Seeder;

class HeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(25, 85, 5) as $height) {
            $d = new Height;
            $d->height = $height;
            $d->save();
        }

    }
}
