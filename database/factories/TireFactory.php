<?php

namespace Database\Factories;

use App\Models\Diameter;
use App\Models\Height;
use App\Models\Pattern;
use App\Models\Season;
use App\Models\Width;
use Illuminate\Database\Eloquent\Factories\Factory;

class TireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $w = Width::all()->random()->width;
        $h = Height::all()->random()->height;
        $r = Diameter::all()->random()->diameter;

        return [
            'pattern_id' => Pattern::all()->random()->id,
            'width' => $w,
            'height' => $h,
            'diameter' => $r,
            'season_id' => Season::all()->random()->season,
            'location' => intval('width' . 'height' . 'diameter'),
            'price' => rand(2000, 30000),
            'main_category_id' => 1,
            'code' => rand(1, 100)
            //
        ];
    }
}
