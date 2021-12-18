<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = ['Michelin', 'Continental', 'Dunlop', 'Pirelli', 'Sava', 'Tigar', 'Sailun', 'Goodyear', 'Cooper', 'Kelly', 'Star Fire', 'Nankang'];

        foreach ($brands as $brand) {
            $b = new Brand;
            $b->name = $brand;
            $b->save();
        }
    }
}
