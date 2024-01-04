@extends('Backend.master')

@section('title')
    Add Dish
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-5 my-lg-5">

                @if (Session::get('sms'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('sms') }}</strong>
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif


                <div class="card">
                    <div class="card-header text-center">
                        Add Dish
                    </div>
                    <div class="card-body">
                        <form action="{{ route('save_dish_data') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Dish Name</label>
                                <input type="text" class="form-control" name="dish_name">
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $data)
                                        <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Detail</label>
                                <textarea type="text" class="form-control" name="dish_detail" rows="5"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="dish_image">
                            </div>

                            <div class="form-group">
                                <label>Dish Status</label>
                                <div class="radio">
                                    <input type="radio" name="dish_status" value="1">Active
                                    <input type="radio" name="dish_status" value="0">Inactive
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" title="You can skip this..">Dish Attributes</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Full Price</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="full_price" placeholder="Enter price">
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <label for="">Half Price</label>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <input type="text" class="form-control" name="half_price" placeholder="Enter second price">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-outline-primary btn-block">Save Dish</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
