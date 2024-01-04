<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function registrationPage()
    {
        return view('Frontend.Customer.registration');
    }
    public function registrationComplete(Request $request)
    {        
        // dd('ok');
        Customer::create([
            'user_id' => $request->user_id,
            'phone_number' => $request->phone_number,
            'address' => $request->address
        ]);
        return view('Frontend.Checkout.checkoutPage');
    }
}
