<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatternRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Pattern;
use App\Models\Season;

class PatternsController extends Controller
{
    public function create()
    {
        $seasons = Season::all();
        $brands = Brand::all();
        $categories = Category::all();

        return view('dashboard.patterns.create')->with([
            'seasons' => $seasons,
            'brands' => $brands,
            'categories' => $categories
        ]);
    }

    public function store(PatternRequest $request)
    {
        $pattern = new Pattern;
        $pattern->category_id = $request->category_id;
        $pattern->season_id = $request->season_id;
        $pattern->name = $request->name;
        $pattern->brand_id = $request->brand_id;
        $request->file('image')->store('patterns', 'public');
        $pattern->image = $request->file('image')->hashName();
        $pattern->save();

        return redirect()->back();

    }
}
