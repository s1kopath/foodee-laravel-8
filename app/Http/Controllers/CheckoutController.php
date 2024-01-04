<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function check()
    {
        // dd(Session::get('user_id'));
        $userId = Session::get('user_id');
        $customer = Customer::where('user_id', $userId)->first();
        if ($customer) {
            return view('Frontend.Checkout.checkoutPage');
        }
        else {
            return redirect()->route('user_registration');
        }
        
    }
}
