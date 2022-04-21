<?php

namespace Database\Seeders;

use App\Models\Tire;
use Illuminate\Database\Seeder;

class TiresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tire::factory(['height' => '55', 'width' => '205', 'diameter' => '16'])->count(30)->create();
    }
}
