@extends('Backend.master')

@section('title')
    Manage Delivery Boy
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
            <h3 class="card-title">Manage Delivery Boy</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Added on</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($categories); --}}
                    @foreach ($boy as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->delivery_boy_name }}</td>
                            <td>{{ $data->delivery_boy_phone_number }}</td>
                            <td>{{ $data->added_on }}</td>
                            <td>

                                @if ($data->delivery_boy_status == 1)
                                    <a class="btn btn-outline-info" href="{{ route('delivery_boy_status', [$data->id, 0]) }}">
                                        <i class="fas fa-arrow-down" title="Click to Inactive"></i>
                                    </a>
                                @else
                                    <a class="btn btn-outline-success" href="{{ route('delivery_boy_status', [$data->id, 1]) }}">
                                        <i class="fas fa-arrow-up" title="Click to Active"></i>
                                    </a>
                                @endif

                                <a type="button" class="btn btn-outline-dark" data-toggle="modal"
                                    data-target="#edit{{ $data->id }}">
                                    <i class="fas fa-edit" title="Click to Change it"></i>
                                </a>

                                <a class="btn btn-outline-danger" href="{{ route('delivery_boy_delete', $data->id) }}">
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
                                        <h5 class="modal-title" id="exampleModalLabel">Update {{ $data->delivery_boy_name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="{{ route('delivery_boy_update') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="delivery_boy_name"
                                                    value="{{ $data->delivery_boy_name }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" class="form-control" name="delivery_boy_phone_number"
                                                    value="{{ $data->delivery_boy_phone_number }}">
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
