<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $allBanner = Banner::all();

        $popularCategory= Category::all();

        $allCategory = Category::limit(4)->get();

        $trendyProducts = Product::latest()->limit(4)->get();

        $justForYou = Product::limit(8)->get();

        $allBrand = Brand::all();

        return view('frontend.home', compact('allBanner','popularCategory', 'allCategory','allBrand', 'trendyProducts','justForYou'));
    }

    public function shop()
    {
        $allProduct = Product::all();

        return view('frontend.pages.shop', compact('allProduct'));
    }

    public function github($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function githubCallBack()
    {
        $user = Socialite::driver('github')->user();

        $customer=Customer::where('provider_id',$user->id)->first();

        if($customer)
        {
            Auth::guard('customerGuard')->login($customer, true);
            toastr()->success('Login Successfull');
        }else{
            $customer=Customer::create([
            'name' => $user->name,
            'email' => strtolower($user->nickname).'@gmail.com',
            'number' =>'01717181818' ,
            'image' =>$user->avatar, 
            'provider_id' =>$user->id, 
            'password' =>bcrypt('123456'), 
            'address' =>$user->location, 
            ]);
            Auth::guard('customerGuard')->login($customer, true);
            toastr()->success('Register and Login Successfull');
        }
        return redirect()->route('frontend.home');

    }

}
