<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['car', 'van', 'suv'];
        
        foreach ($categories as $category) {
            $c = new Category;
            $c->name = $category;
            $c->save();
        }
    }
}
