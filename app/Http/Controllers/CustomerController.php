<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

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
