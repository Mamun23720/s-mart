<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusinessSettingController extends Controller
{
    public function faqs()
    {
        return view('frontend.pages.faqs');
    }
    public function help()
    {
        return view('frontend.pages.help');
    }
    public function support()
    {
        return view('frontend.pages.support');
    }
}
