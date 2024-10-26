<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function proceedToCheckout()
    {
        return view('frontend.pages.checkout');
    }

    public function continueToCheckout(Request $request)
    {
        dd($request->all());

        //validation

        // $validation = Validator::make($request->all(), [
        //     'receiverName' => 'required',
        //     'receiverNumber' => 'required|numeric',
        //     'receiverEmail' => 'required|email',
        //     'receiverAddress' => 'required',
        //     'receiverCountry' => 'required',
        //     'receiverCity' => 'required',
        //     'receiverZip' => 'required',
        //     'receiverPaymentMethod' => 'required',
        // ]);

        // if ($validation->fails())
        // {
        //     foreach ($validation->errors()->all() as $errorMessage) {
        //         toastr()->error($errorMessage);
        //     }
        //     return redirect()->route('backend.pages.bannerForm')->withErrors($validation)->withInput();
        // }


        // $myCart = session()->get('basket');

        // //quary for store data into Orders table

        // $order = Order::create([

        //     'name' => $request->receiverName,
        //     'number' => $request->receiverNumber,
        //     'email' => $request->receiverEmail,
        //     'address' => $request->receiverAddress,
        //     'address' => $request->receiverCountry,
        //     'address' => $request->receiverCity,
        //     'address' => $request->receiverZip,
        //     'payment' => $request->receiverPaymentMethod,
        //     // 'customer_id' => auth('customerGuard')->user()->id,
        //     'total_amount' => array_sum(array_column($myCart, 'subtotal'))

        // ]);

        // // foreach ($myCart as $singleData) {

        // //     OrderDetail::create([

        // //         'order_id' => $order->id,
        // //         'product_id' => $singleData['product_id'],
        // //         'product_unit_price' => $singleData['product_price'],
        // //         'product_quantity' => $singleData['quantity'],
        // //         'subtotal' => $singleData['subtotal'],

        // //     ]);
        // // }

        // //  dd($request->all());

        // // toastr()->success('Order places successfully.');

        // // session()->forget('basket');

        // // return redirect()->route('view.invoice', $order->id);

    }
}
