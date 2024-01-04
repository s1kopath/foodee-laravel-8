<?php

namespace App\Http\Controllers;

use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showLogin()
    {
        return view('Backend.loginPage');
    }
    public function registration(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'email|required|unique:users',
            'password'=>'required|min:6'

        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
        //authenticate
        $credentials = $user->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request -> session() -> regenerate();
            Session::put('user_id', auth()->user()->id);

            if (Cart::content()) {
                return redirect()->route('user_registration');
            } else {
                return redirect()->route('homepage');
            }
        }

        // return redirect()->back();
    }

    public function login(Request $request)
    {
        //validate input
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        //authenticate
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $request -> session() -> regenerate();
            Session::put('user_id', auth()->user()->id);
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif (auth()->user()->role == 'user') {
                if (Cart::count() == 0) {
                    return redirect()->route('homepage');
                } else {
                    return redirect()->route('checkout_page');
                }
            }
        }
        return back()->withErrors([
            'email' => 'Invalid Credentials.',
        ]);
    }
    public function logout()
    {
        if (Auth::user()->role == 'admin') {
            Auth::logout();
            return redirect()->route('show.loginPage');
        } else {
            Auth::logout();
            return redirect()->route('homepage');
        }
    }
}
