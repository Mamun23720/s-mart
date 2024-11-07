<?php

namespace App\Http\Controllers;

use App\Mail\SendWelcomeMail;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Throwable;

class MailController extends Controller
{
    public function sendMail()
    {
        try
        {
            $toEmailAddress = "sajib@gmail.com";
            $welcomeMessage = "Welcome to Our Online Shop !";
            $response = Mail::to($toEmailAddress)->send(new SendWelcomeMail($welcomeMessage));
            dd($response);
        }
        catch(Throwable $e)
        {
            toastr()->error('Something Went Wrong');

            return redirect()->route('frontend.home');
        }
    }

    public function checkOtp(Request $request)
    {
        $checkOtp=Customer::where('email',$request->customerEmail)->where('otp',$request->otp)->first();

        if($checkOtp)
        {
            
            $checkOtp->update([
                'is_email_verified'=> true,
                'is_mobile_verified'=>true,
                'otp'=>null
            ]);

            toastr()->success('OTP Verified');

            return redirect()->route('frontend.customer.login');

        }else
        {
            toastr()->error('Invalid OTP');

            return redirect()->back();

        }
    }
}
