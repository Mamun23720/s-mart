<?php

namespace App\Http\Controllers;

use App\Mail\SendWelcomeMail;
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
}
