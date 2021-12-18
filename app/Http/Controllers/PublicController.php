<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Diameter;
use App\Models\Height;
use App\Models\Season;
use App\Models\Width;
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
}
