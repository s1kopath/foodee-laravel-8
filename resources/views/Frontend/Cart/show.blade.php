@extends('Frontend.master')
@section('title')
    Show Cart
@endsection
@section('content')



    <div class="products">
        <div class="container">
            <div class="col-md-12 " style="overflow-x:auto;">
                @if (!Auth()->user())
                    <marquee class="text-danger" behavior="alternate" scrollamount="10" direction="right">Login / Register
                        to checkout</marquee>
                @endif


                <h4>Food Collection</h4>
                <table id="example2" class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Dish Name</th>
                            <th>Dish Image</th>
                            <th>Dish Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dd($cartDish) --}}
                        @php
                            $key = 1;
                            $total = 0;
                        @endphp
                        @foreach ($cartDish as $data)
                            <tr>
                                <td>{{ $key++ }}</td>
                                <td>{{ $data->name }}</td>
                                <td>
                                    <img src="{{ asset($data->options->image) }}" height="25%" width="68"
                                        style="border-radius: 50%" class="img-fluid img-thembnail">
                                </td>

                                @if ($data->options->half_price == null)
                                    <td>{{ $data->price }} TK</td>
                                @else
                                    <td>{{ $data->options->half_price }} TK</td>
                                @endif

                                <td>
                                    <form action="{{ route('update_item') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="rowId" value="{{ $data->rowId }}">
                                        <div class="roe">
                                            <div class="col-md-8">
                                                <input type="number" class="form-control" name="qty"
                                                    value="{{ $data->qty }}" min="1">
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                                            </div>
                                        </div>


                                    </form>
                                </td>

                                @if ($data->options->half_price == null)
                                    <td>{{ $subtotal = $data->price * $data->qty }} TK</td>
                                @else
                                    <td>{{ $subtotal = $data->options->half_price * $data->qty }} TK</td>
                                @endif

                                @php
                                    $total += $subtotal;
                                @endphp

                                <td>
                                    <a href="{{ route('remove_item', $data->rowId) }}" class="btn btn-danger">
                                        <span aria-hidden="true">✕</span>
                                    </a>
                                </td>


                            </tr>


                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="text-right">Total Price:</th>
                            <th>{{ $total }} TK</th>
                            <th>

                                <a href="{{ route('checkout_page') }}" class="btn btn-primary">Checkout</a>


                            </th>
                        </tr>
                    </tfoot>
                </table>
                <div class="clearfix"> </div>



            </div>

            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //products -->




@endsection
