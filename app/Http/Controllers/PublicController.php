<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Diameter;
use App\Models\Height;
use App\Models\Pattern;
use App\Models\Season;
use App\Models\Tire;
use App\Models\Width;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $seasons = Season::all();
        $brands = Brand::all();
        $witdhs = Width::all();
        $heights = Height::all();
        $diameters = Diameter::all();
        return view('welcome')->with([
            'categories' => $categories,
            'seasons' => $seasons,
            'brands' => $brands,
            'witdhs' => $witdhs,
            'heights' => $heights,
            'diameters' => $diameters
        ]);
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $seasons = Season::all();
        $brands = Brand::all();

        $dimension = intval($request->witdh . $request->height . $request->diameter);
        $tires = Tire::where('location', $dimension)->get();
        $view = view('partials.tires_search')
            ->with([
                'tires' => $tires,
                'categories' => $categories,
                'seasons' => $seasons,
                'brands' => $brands,
                'category_id' => $category_id ?? 'all',
                'brand_id' => $brand_id ?? 'all',
                'season_id' => $season_id ?? 'all'
                ])->render();

        return response()->json(['view' => $view, 'location' => $dimension]);
    }


    public function filter(Request $request)
    {
        $categories = Category::all();
        $seasons = Season::all();
        $brands = Brand::all();
        $location = $request->location;

        $outcome = ['season' => '', 'category' => '', 'brand' => ''];
        $query = Tire::query();
        if ($request->season_id != 'all') {
            $season_id = $request->season_id;
            $outcome['season'] = Season::findOrFail($season_id)->name;
            $query->where('season_id', $season_id);
        }
        if ($request->category_id != 'all') {
            $category_id = $request->category_id;
            $outcome['category'] =  Category::findOrFail($category_id)->name;
            $query->whereHas('pattern',function ($query) use ($category_id) {
                $query->where('category_id', $category_id);
            });
        }
        if ($request->brand_id != 'all') {
            $brand_id = $request->brand_id;
            $outcome['brand'] = Brand::findOrFail($brand_id)->name;
            $query->whereHas('pattern',function ($query) use ($brand_id) {
                $query->where('brand_id', $brand_id);
            });
        }

        $results = collect($outcome);

        $tires = $query->where('location', $location)->get();

        $view = view('partials.tires_search')
            ->with([
                'tires' => $tires,
                'categories' => $categories,
                'seasons' => $seasons,
                'brands' => $brands,
                'category_id' => $category_id ?? 'all',
                'brand_id' => $brand_id ?? 'all',
                'season_id' => $season_id ?? 'all',
                'results' => $results
            ])->render();

        return response()->json(['view' => $view]);
    }

    public function show_tire($brand, $id)
    {
        $tire = Tire::findOrFail($id);
            return view('tires.show', compact('tire'));
    }

    public function add_to_cart(Request $request)
    {
        $tire = Tire::findOrFail($request->tire_id);
        Cart::add($tire->id, $tire->name, $request->qty, $tire->price, ['brand' => $tire->brand()->name]);

        return response()->json(['success' => 'Успешно додадени во кошничката']);
    }
}
