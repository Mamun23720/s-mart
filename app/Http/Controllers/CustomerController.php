<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function customerRegistration()

    {
        return view('frontend.pages.registrationForm');
    }

    public function customerRegistrationStore(Request $request)
    {
        // dd($request->all());

        // $validation = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'username' => 'required',
        //     'email' => 'required | email',
        //     'dob' => 'required',
        //     'number' => 'required',
        //     'image' => 'file',
        // ]);

        // if ($validation->fails())
        // {
        //     foreach ($validation->errors()->all() as $errorMessage) {
        //         toastr()->error($errorMessage);
        //     }
        //     return redirect()->route('frontend.home')->withErrors($validation)->withInput();
        // }

        $fileName = null;

        if ($request->hasFile('customerImage')) {

            $file = $request->file('customerImage');

            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();

            $file->storeAs('customer', $fileName);

        }

        Customer::create([
           'name' => $request->customerName,
            'username' => $request->customerUserName,
            'email' => $request->customerEmail,
            'password' => bcrypt($request->password),
            'dob' => $request->customerDob,
            'number' => $request->customerNumber,
            'image' => $fileName
        ]);

        toastr()->success('Registration Complete Successfully !!!');

        return redirect()->route('frontend.home');
    }

    public function customerLogin()
    {
        return view('frontend.pages.loginForm');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->except('_token');

        $check = auth('customerGuard')->attempt($credentials);

        if ($check) {
            toastr()->success('Login Successfully');

            return redirect()->route('frontend.home');
        } else {
            toastr()->error('Login Failed');

            return redirect()->route('frontend.home');
        }
    }

    public function customerLogout()
    {
        Auth::guard('customerGuard')->logout();
        session()->forget('basket');
        toastr()->success('Logout Successfully !!!');
        return redirect()->route('frontend.home');
    }






















    public function customerList()
    {
        $allCustomer = Customer::all();

        return view('backend.customerList', compact('allCustomer'));
    }

    public function customerForm()
    {
        return view('backend.pages.customerForm');
    }

    public function customerStore()
    {

    }

    public function customerEdit()
    {

    }

    public function customerUpdate()
    {

    }

    public function customerDelete()
    {

    }

}
