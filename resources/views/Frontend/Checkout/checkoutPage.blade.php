@extends('Frontend.master')
@section('title')
    Checkout
@endsection
@section('content')
    <!-- privacy-page -->
    <div class="privacy about">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">Select Payment method</h3>
            <div class="privacy-w3row">

                {{-- <div class="input-group">
                    <div class="input-group-prepend">
                        <h5><input class="form-check-input" type="radio"> Cash on delivery</h5>
                    </div>
                    <div class="input-group-prepend">
                        <h5><input class="form-check-input" type="radio"> Credit Card</h5>
                    </div>
                </div> --}}


                <div class="container text-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="exampleRadios" 
                            value="option1">
                        <label class="form-check-label" for="exampleRadios1">
                            Cash on delivery
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="exampleRadios" 
                            value="option2" id="creditCard">
                        <label class="form-check-label" for="exampleRadios2">
                            Credit Card
                        </label>
                    </div>
                </div>

                <!-- stripe -->

                <div class="login-agileinfo" id="stripe" style="display: none">
                    <form action="" method="post">
                        @csrf
                        <input class="agile-ltext form" type="number" name="phone_number" placeholder="Enter Phone Number"
                            required>
                        <input class="agile-ltext" type="text" name="address" placeholder="Enter Address" required>

                        <input class="agile-ltext" type="file" name="image">


                    </form>

                    <p>Don't want to continue? <a href=""> Go back!</a></p>
                </div>

                <!-- stripe -->

                <div class="container mt-5 text-right">
                    <a href="#" class="btn btn-info">Proceed</a>
                </div>
            </div>
        </div>
    </div>
    <!-- //privacy-page -->

    <script>

        $("#creditCard").on("change", function() {
            if ($(this).is(':checked')) {
                
                $("#stripe").show(300);
                
            } else {
                $("#stripe").hide(300);
                
            }
        });

    </script>


    @endsection
