@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Reservations</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{url()->previous()}}" class="btn btn-dark">
                            Back
                        </a>
                    </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Reservations List
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>People</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $rsv)
                                <tr>
                                    <td>00{{$rsv->id}}</td>
                                    <td>{{$rsv->date}}</td>
                                    <td>{{$rsv->time_of_day}}</td>
                                    <td>{{$rsv->people}}</td>
                                    <td>{{$rsv->name}}</td>
                                    <td>{{$rsv->email}}</td>
                                    <td>{{$rsv->phone}}</td>
                                    <td>{{$rsv->message}}</td>
                                    <td>
                                        @if ($rsv->status == 'PENDING')
                                        <span class="badge badge-primary">{{$rsv->status}}</span>
                                        @endif
                                        @if ($rsv->status == 'ACCEPTED')
                                        <span class="badge badge-success">{{$rsv->status}}</span>
                                        @endif
                                        @if ($rsv->status == 'REJECTED')
                                        <span class="badge badge-danger">{{$rsv->status}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                            data-target="#rsv_modal_{{$rsv->id}}"><i class="far fa-edit"
                                                aria-hidden="true"></i> Edit
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@foreach ($reservations as $rsv)
<div class="modal fade" id="rsv_modal_{{$rsv->id}}" tabindex="-1" aria-labelledby="rsv_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('rsv.status')}}" method="post"> @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="rsv_modalLabel">RSV #00{{$rsv->id}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="rsv_id" id="rsv_id" value="{{$rsv->id}}">
                        <select name="status" id="status" class="form-control custom-select">
                            <option value="ACCEPTED" {{$rsv->status == 'ACCEPTED' ? 'selected' : ''}}>ACCEPTED</option>
                            <option value="REJECTED" {{$rsv->status == 'REJECTED' ? 'selected' : ''}}>REJECTED</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('scripts')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        "ordering":false
      });
    });
</script>
@endsection
