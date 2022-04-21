<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Width;
use App\Models\Height;
use App\Models\Season;
use App\Models\Category;
use App\Models\Diameter;
use App\Models\Pattern;
use App\Models\Tire;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class TiresController extends Controller
{
    public function index(Request $request)
    {
        $seasons = Season::all();
        $location = $request->location;
        $season = $request->season;

        if ($season == null && $location == null) {
            $tires = Tire::all();
        }
        elseif ($season == null) {
            $tires = Tire::where('location', $location)->get();
        } else {
            $season = Season::findOrFail($season);
            $tires = $season->tires->where('location', $location);
        }
        // if ($request->location != null) {
        //     $tires = Tire::where('location', $location)->get();
        // } elseif ($request->summer == 'on') {
        //     $season = Season::where('name', 'summer')->first();
        //     $tires = $season->tires;
        // } else {
        //     $tires = Tire::stock()->get();
        // }

        return view('dashboard.tires.index', compact('tires', 'seasons'));
    }

    public function new()
    {
        $categories = Category::all();
        $seasons = Season::all();
        $brands = Brand::all();
        $widths = Width::all();
        $heights = Height::all();
        $diameters = Diameter::all();
        $patterns = Pattern::all();

        return view('dashboard.tires.new')->with([
            'categories' => $categories,
            'seasons' => $seasons,
            'brands' => $brands,
            'patterns' => $patterns,
            'widths' => $widths,
            'heights' => $heights,
            'diameters' => $diameters
        ]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        $tire = new Tire;
        $tire->pattern_id = $request->pattern;
        $tire->width = $request->width;
        $tire->height = $request->height;
        $tire->diameter = $request->diameter;
        $tire->price = $request->price;
        $tire->season_id = $tire->pattern->season_id;

        $tire->location = intval($request->width . $request->height . $request->diameter);
        // return $tire;
        $tire->save();

        return redirect()->back()->with(['message' => 'Успешно внесен е артикалот во база']);
    }

    public function get_season(Request $request)
    {

        $brand = Brand::findOrFail($request->brand_id);
        return response()->json($brand->patterns);
    }
}
