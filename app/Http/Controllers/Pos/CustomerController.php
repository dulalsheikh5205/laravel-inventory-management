<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function CustomerAll()
    {
         // $customers = Customer::all();
         $customers = Customer::latest()->get();
         return view('backend.customer.customer_all',compact('customers'));

    }// End Method

    public function CustomerAdd()
    {
        return view('backend.customer.customer_add');
    }// End Method
}
