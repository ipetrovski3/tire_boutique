<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasons = ['Winter', 'Summer', 'All Season'];

        foreach ($seasons as $season) {
            $s = new Season;
            $s->name = $season;
            $s->save();
        }
    }
}
