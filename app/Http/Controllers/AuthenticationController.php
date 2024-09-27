<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{   
    public function loginForm()
    {
        return view('backend.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->except("_token");

        $check = Auth::attempt($credentials);

        if ($check) {

            toastr()->success('Login Successful !!');

            return redirect()->route('backend.dashboard');
        } else {

            toastr()->error('Something Went Wrong. Please Check Your Email & Password !!');

            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();

        toastr()->success('Logout Successful !!');

        return redirect()->route('login');
    }

}
