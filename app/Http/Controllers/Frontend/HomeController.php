<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $allBanner = Banner::all();

        $allCategory = Category::limit(4)->get();

        $trendyProducts = Product::latest()->limit(4)->get();

        $justForYou = Product::limit(8)->get();

        $allBrand = Brand::all();

        return view('frontend.home', compact('allBanner', 'allCategory','allBrand', 'trendyProducts','justForYou'));
    }

    public function shop()
    {
        $allProduct = Product::all();

        return view('frontend.pages.shop', compact('allProduct'));
    }

}
