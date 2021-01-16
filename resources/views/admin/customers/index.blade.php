@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{__('Customers')}}</h1>
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
                            Customers List (Total Customers : {{$customers->count()}})
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="customers" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr #</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Post code</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count=1; @endphp
                                @foreach ($customers as $customer)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->phone_no}}</td>
                                    <td>{{$customer->zip_code}}</td>
                                    <td>
                                        @if ($customer->status == 1)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-danger">Suspended</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($customer->status == 0)
                                        <button class="btn btn-primary btn-xs" id="activateButton{{$customer->id}}"
                                            onclick="suspendAccount('{{$customer->id}}')">Activate Account</button>
                                        <button class="btn btn-primary btn-xs hidden"
                                            id="loadingButton{{$customer->id}}" type="button" disabled>
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Loading...
                                        </button>
                                        @else
                                        <button class="btn btn-primary btn-xs" id="suspendButton{{$customer->id}}"
                                            onclick="suspendAccount('{{$customer->id}}')">Suspend Account</button>
                                        <button class="btn btn-primary btn-xs hidden"
                                            id="loadingButton{{$customer->id}}" type="button" disabled>
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Loading...
                                        </button>
                                        @endif
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

@endsection

@section('scripts')
<script>
    $(function () {
      $("#customers").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
</script>

<script>
    function suspendAccount(customer_id) {
        if (confirm('Are you sure?') == true) {
            $.ajax({
            type: "POST",
            url: '{{route('customerSuspendAccount')}}',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'customer_id': customer_id,
            },
            success: function (response) {
                if (response == 1) {
                    setInterval('location.reload()', 1000);
                    $("#suspendButton"+customer_id).addClass("hidden");
                    $("#activateButton"+customer_id).addClass("hidden");
                    $("#loadingButton"+customer_id).removeClass("hidden");
                } 
            }
        });
        }

    }
</script>
@endsection