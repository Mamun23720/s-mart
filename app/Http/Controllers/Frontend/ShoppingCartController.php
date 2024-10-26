<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function viewCart()
    {
        return view('frontend.pages.viewCart');
    }

    public function addToCart($pId)

    {
        $product = Product::find($pId);

        // dd($product);

        $myCart = session()->get('basket');

        // session()->forget('basket');

        if (empty($myCart)) {

            $cart[$product->id] = [

                'id' => $product->id,
                'image' => $product->image,
                'name' => $product->name,
                'price' => ($product->price - ($product->price * $product->discount) / 100),
                'quantity' => 1,
                'subtotal' => 1 * ($product->price - ($product->price * $product->discount) / 100),

            ];

            session()->put('basket', $cart);

            toastr()->success('Product Added To Cart !!!');

            return redirect()->back();
        } else {

            if (array_key_exists($pId, $myCart)) {

                $myCart[$pId]['quantity'] = $myCart[$pId]['quantity'] + 1;

                $myCart[$pId]['subtotal'] = $myCart[$pId]['quantity'] * $myCart[$pId]['price'];

                session()->put('basket', $myCart);

                //session()->forget('basket');

                toastr()->success('Product Added To Cart Again !!!');

                return redirect()->back();
            } else {

                $myCart[$product->id] = [

                    'id' => $product->id,
                    'image' => $product->image,
                    'name' => $product->name,
                    'price' => ($product->price - ($product->price * $product->discount) / 100),
                    'quantity' => 1,
                    'subtotal' => 1 * ($product->price - ($product->price * $product->discount) / 100),

                ];

                session()->put('basket', $myCart);

                toastr()->success('Product Added To Cart !!!');

                return redirect()->back();
            }
        }
    }

    public function removeCart($pId)

    {
        // dd($pId);
        $myCart = session()->get('basket');

        unset($myCart[$pId]);

        session()->put('basket', $myCart);

        // session()->forget('pId');

        toastr()->success('Product Removed Successfully !!!');

        return redirect()->back();
    }

}
