<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Throwable;

class ProductController extends Controller
{
    public function viewProduct($slug)
    {
        try
        {
            $product = Product::where('slug', $slug)->first();

            $relatedProducts = Product::where('id', '!=', $product->id)
                                        ->where('category_id', '=', $product->category_id)
                                        ->get()
                                        ->random(4);

            return view('frontend.pages.viewProduct', compact('product','relatedProducts'));

        }
        catch(Throwable $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }

    }

}
