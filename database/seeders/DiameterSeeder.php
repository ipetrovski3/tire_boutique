<?php

namespace Database\Seeders;

use App\Models\Diameter;
use Illuminate\Database\Seeder;

class DiameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(12, 24) as $diameter) {
            $d = new Diameter;
            $d->diameter = $diameter;
            $d->save();
        }
    }
}
