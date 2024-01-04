@extends('Frontend.master')
@section('title')
    Registration
@endsection
@section('content')
    <!-- sign up-page -->
    <div class="login-page about">
        <img class="login-w3img" src="images/img3.jpg" alt="">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">Continue registration</h3>
            <div class="login-agileinfo">
                <form action="{{ route('complete_registration') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" required="">
                    <input class="agile-ltext form" type="number" name="phone_number" placeholder="Enter Phone Number"
                        required>
                    <input class="agile-ltext" type="text" name="address" placeholder="Enter Address" required>

                    <input class="agile-ltext" type="file" name="image">



                    <input type="submit" value="Confirm">
                </form>

                <p>Don't want to continue? <a href="{{ route('cart_show') }}"> Go back!</a></p>
            </div>
        </div>
    </div>
    <!-- //sign up-page -->


@endsection
