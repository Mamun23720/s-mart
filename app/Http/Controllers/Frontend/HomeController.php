<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $trendyProducts = Product::latest()->limit(8)->get();

        $justForYou = Product::all();

        $allCategory = Category::limit(6)->get();

        $allBrand = Brand::all();

        return view('frontend.home', compact('allCategory','allBrand', 'trendyProducts','justForYou'));
    }
}
