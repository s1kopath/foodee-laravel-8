<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()){
            if(Auth::user()->role == 'user'){
                return $next($request);
            }
            else{
                Auth::logout();
                return redirect()->route('show.loginPage')->with('error', 'You not a Worker. Please Enter correct info.');
            }
        }
        else{
            return redirect()-> route('show.loginPage');
        }
    }
}
