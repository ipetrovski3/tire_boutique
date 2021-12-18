<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(BrandSeeder::class);
       $this->call(CategorySeeder::class);
       $this->call(DiameterSeeder::class);
       $this->call(HeightSeeder::class);
       $this->call(SeasonSeeder::class);
       $this->call(WidthSeeder::class);
       $this->call(PatternSeeder::class);
    }
}
