@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Gallery</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{route('gallery.create')}}" class="btn btn-success">
                            Add New Image
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
                            Gallery List (Total Gallery : {{$galleries->count()}})
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="banners" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($galleries as $gallery)
                                <tr>
                                    <td>{{$gallery->id}}</td>
                                    <td>
                                        <img class="w-25" src="{{ asset('storage/app/public/'.$gallery->image_url) }}">
                                    </td>
                                    <td>
                                        @if ($gallery->status == 1)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('gallery.edit', $gallery->id) }}" class="mr-2">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <a href="javascript:void(0);" onclick="deleteBanner('{{$gallery->id}}');">
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
      $("#banners").DataTable({
        "responsive": true,
        "autoWidth": false,
          "order": [[ 0, "desc" ]],
          "columnDefs": [ {
              "targets"  : 'no-sort',
              "orderable": false,
          }]
      });
    });
    // Delete Banner
    function deleteBanner(gallery_id) {
        var result = window.confirm('Are you sure you want to delete this Image?  This action cannot be undone. Proceed?');
        if (result == false) {
            e.preventDefault();
        }else{

            $.ajax({
                method: "POST",
                url: './gallery/destroy',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    'gallery_id': gallery_id
                    },
                success: function (response) {
                    location.reload();
                }
            });
        }
    };
</script>
@endsection
