@extends('Backend.master')

@section('title')
    Manage Dishes
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
            <h3 class="card-title">Dishes Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Details</th>
                        <th>Image</th>
                        <th>Added On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($categories); --}}
                    @foreach ($dishes as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->dish_name }}</td>
                            <td>{{ $data->dishCategory->category_name }}</td>
                            <td>{{ $data->dish_detail }}</td>
                            <td>
                                <img src="{{ asset($data->dish_image) }}" height="25" width="68"
                                    class="img-fluid img-thembnail">
                            </td>
                            <td>{{ $data->created_at }}</td>
                            <td>

                                @if ($data->dish_status == 1)
                                    <a class="btn btn-outline-info" href="{{ route('dish_status', [$data->id, 0]) }}">
                                        <i class="fas fa-arrow-down" title="Click to Inactive"></i>
                                    </a>
                                @else
                                    <a class="btn btn-outline-success" href="{{ route('dish_status', [$data->id, 1]) }}">
                                        <i class="fas fa-arrow-up" title="Click to Active"></i>
                                    </a>
                                @endif

                                <a type="button" class="btn btn-outline-dark" data-toggle="modal"
                                    data-target="#edit{{ $data->id }}">
                                    <i class="fas fa-edit" title="Click to Change it"></i>
                                </a>

                                <a class="btn btn-outline-danger" href="{{ route('delete_dish', $data->id) }}">
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
                                            {{ $data->dish_name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="{{ route('update_dish') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                            <div class="form-group">
                                                <label>Dish Name</label>
                                                <input type="text" class="form-control" name="dish_name"
                                                    value="{{ $data->dish_name }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select name="category_id" id="" class="form-control">
                                                    <option value="">Select Category</option>
                                                    @foreach ($categories as $cate)
                                                        <option @if ($data->category_id == $cate->id) selected @endif
                                                            value="{{ $cate->id }}">{{ $cate->category_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Dish Detail</label>
                                                <textarea type="text" class="form-control" name="dish_detail"
                                                    rows="5">{{ $data->dish_detail }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Previous Image</label>
                                                <img src="{{ asset($data->dish_image) }}" style="height: 150px; width: 150px; border-radius: 50%;"
                                                    class=" mb-1">
                                                <input type="file" class="form-control" name="dish_image">

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
                                                                <input type="text" class="form-control" value="{{ $data->full_price }}" name="full_price" placeholder="Enter price">
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <label for="">Half Price</label>
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <input type="text" class="form-control" value="{{ $data->half_price }}" name="half_price" placeholder="Enter second price">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-outline-warning btn-block">Update</button>

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
