@extends('Backend.master')

@section('title')
    Manage Coupon Code
@endsection

@section('content')
    {{-- ======alart start====== --}}
    @if (Session::get('sms'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('sms') }}</strong>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{-- ======alart end====== --}}

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Coupon Code Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Code</th>
                        <th>Type</th>
                        <th>Value</th>
                        <th>Cart Min</th>
                        <th>Expire On</th>
                        <th>Added On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($categories); --}}
                    @foreach ($coupons as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->coupon_code }}</td>
                            <td>
                                @if ($data->coupon_type == 1)
                                    Parcentage
                                @else
                                    Fixed
                                @endif
                            </td>
                            <td>{{ $data->coupon_value }}</td>
                            <td>{{ $data->cart_min_value }}</td>
                            <td>{{ $data->expired_on }}</td>
                            <td>{{ $data->added_on }}</td>
                            <td>

                                @if ($data->coupon_status == 1)
                                    <a class="btn btn-outline-info"
                                        href="{{ route('coupon_code_status', [$data->id, 0]) }}">
                                        <i class="fas fa-arrow-down" title="Click to Inactive"></i>
                                    </a>
                                @else
                                    <a class="btn btn-outline-success"
                                        href="{{ route('coupon_code_status', [$data->id, 1]) }}">
                                        <i class="fas fa-arrow-up" title="Click to Active"></i>
                                    </a>
                                @endif

                                <a type="button" class="btn btn-outline-dark" data-toggle="modal"
                                    data-target="#edit{{ $data->id }}">
                                    <i class="fas fa-edit" title="Click to Change it"></i>
                                </a>

                                <a class="btn btn-outline-danger" href="{{ route('delete_coupon_code', $data->id) }}">
                                    <i class="fas fa-trash" title="Click to Destroy"></i>
                                </a>
                            </td>
                        </tr>

                        {{-- ==========================modal start======================= --}}

                        <div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update
                                            {{ $data->coupon_code }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="{{ route('update_coupon_code') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                            <div class="form-group">
                                                <label>Code Name</label>
                                                <input type="text" class="form-control" name="coupon_code"
                                                    value="{{ $data->coupon_code }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Value</label>
                                                <input type="number" class="form-control" name="coupon_value"
                                                    value="{{ $data->coupon_value }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Cart Min Value</label>
                                                <input type="number" class="form-control" name="cart_min_value"
                                                    value="{{ $data->cart_min_value }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Select Coupon Type</label>
                                                <div class="radio">
                                                    <input type="radio" name="coupon_type" value="1">Percentage
                                                    <input type="radio" name="coupon_type" value="0">Fixed
                                                </div>
                                            </div>
                                            <button type="submit" name="btn"
                                                class="btn btn-outline-warning btn-block">Update</button>

                                        </form>


                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- ===================modal end=================== --}}
                    @endforeach
                </tbody>
                {{-- <tfoot>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                    </tr>
                </tfoot> --}}
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
