<?php

namespace App\Http\Controllers;

use App\Jobs\CustomerRegistrationEmailJob;
use App\Mail\SendWelcomeMail;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Throwable;
use Yajra\DataTables\Facades\DataTables;

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

            $fileName = date(format: 'Ymdhis') . '.' . $file->getClientOriginalExtension();

            $file->storeAs('customer', $fileName);

        }

        $otp=rand(100000,999999);

        Customer::create([
           'name' => $request->customerName,
            'username' => $request->customerUserName,
            'email' => $request->customerEmail,
            'password' => bcrypt($request->password),
            'dob' => $request->customerDob,
            'number' => $request->customerNumber,
            'image' => $fileName,
            'address' => $request->customerAddress,
            'otp' => $otp,
        ]);

        $customerEmail = $request->customerEmail;

        // Mail::to($request->customerEmail)->send(new SendWelcomeMail($otp));
        dispatch(new CustomerRegistrationEmailJob($customerEmail,$otp));

        toastr()->success('Registration Complete Successfully !!!');

        return view('frontend.pages.otp', compact('customerEmail'));
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

            $verifiedCustomer= auth('customerGuard')->user()->is_email_verified;

            if($verifiedCustomer)
            {
                toastr()->success('Login Successfully');

            return redirect()->route('frontend.home');
            }

            Auth::guard('customerGuard')->logout();

            toastr()->error('Account Not Verified');

            $customerEmail = $request->email;

            return view('frontend.pages.otp', compact('customerEmail'));
            
        } else {
            toastr()->error('Invalid Credentials');

            return redirect()->back();
        }
    }

    public function customerLogout()
    {
        Auth::guard('customerGuard')->logout();
        session()->forget('basket');
        toastr()->success('Logout Successfully !!!');
        return redirect()->route('frontend.home');
    }

    public function viewProfile()
    {
        return view('frontend.pages.viewProfile');
    }

    public function editProfile()
    {
        return view('frontend.pages.viewProfileEdit');
    }

    public function submitProfile(Request $request)
    {
    //  dd($request->all());  
        $customer= auth('customerGuard')->user();

        $customer->update([
            'name' => $request->customerName,
            'number' => $request->customerNumber,
            'address' => $request->customerAddress,
        ]);

        toastr()->success('Profile Updated Successfully !!!');

        return view('frontend.pages.viewProfile');

    }

//backend

    public function customerList()
    {
        return view('backend.customerList');
    }


    public function getCustomerData()
    {
        try
        {
            $data=Customer::all();
                return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($row){
                                $editUrl = route('backend.customer.edit', $row->id);
                                $btn = '<a href="' . $editUrl . '" class="edit btn btn-primary btn-sm mr-2">Edit</a>';
                                    return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        catch(Throwable $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
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
