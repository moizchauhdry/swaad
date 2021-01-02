@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Postal Codes</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{route('codes.create')}}" class="btn btn-success">
                            Add Postal Code
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
                            Codes List (Total codes : {{$codes->count()}})
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="codes" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Postal Code</th>
                                    <th>Amount</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($codes as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->postal_code}}</td>
                                    <td>{{$item->net_total}}</td>
                                    <td>
                                        <a href="{{ route('codes.edit', $item->id) }}" class="mr-2">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <a href="javascript:void(0);" onclick="deleteitem('{{$item->id}}');">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
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
      $("#codes").DataTable({
        "responsive": true,
        "autoWidth": false,
          "order": [[ 0, "desc" ]],
          "columnDefs": [ {
              "targets"  : 'no-sort',
              "orderable": false,
          }]
      });
    });
    // Delete item
    function deleteitem(item_id) {
        var result = window.confirm('Are you sure you want to delete this item?  This action cannot be undone. Proceed?');
        if (result == false) {
            e.preventDefault();
        }else{

            $.ajax({
                method: "POST",
                url: './item/delete',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    'item_id': item_id
                    },
                success: function (response) {
                    location.reload();
                }
            });
        }
    };
</script>
@endsection