<?php

namespace Database\Seeders;

use App\Models\MainCategory;
use Illuminate\Database\Seeder;

class MainCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Tires', 'Products', 'Services'];

        foreach($names as $name) {
            $main = new MainCategory;
            $main->name = $name;
            $main->save();
        }
    }
}
