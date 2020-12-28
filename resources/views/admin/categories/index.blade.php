@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Categories</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('categories.create')}}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus mr-1" aria-hidden="true"></i> Add Category</a></li>
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
                            Categories List (Total Categories : {{$categories->count()}})
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr #</th>
                                    <th>Title</th>
                                    <th>Title (gr)</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 1; @endphp
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{$count ++}}</td>
                                    <td>{{$category->title}}</td>
                                    <td>{{$category->title_gr}}</td>
                                    <td>
                                        @if ($category->image_url != NULL && Storage::exists($category->image_url))
                                        <img src="{{asset('storage/app/public/'.$category->image_url)}}" id="image"
                                            class="w-25" />
                                        @else
                                        <img src="{{asset('public/images/placeholder.png') }}" id="image"
                                            class="w-25" />
                                        @endif
                                    </td>
                                    <td>
                                        @if ($category->status == 1)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('categories.edit',$category->id)}}"
                                            class="btn btn-primary btn-sm">
                                            <i class="far fa-edit" aria-hidden="true"></i> Edit
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
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });

    // Deactivate/Delete Categories Level 1
    function deactivateCategory(category_id) {
        var result = window.confirm('Are you sure you want to Delete this Category?');
        if (result == false) {
            event.preventDefault();
        } else {
            $.ajax({
                method: "POST",
                url: './category/deactivate',
                data: { 
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    'category_id': category_id
                    },
                success: function (response) {
                    alert('success')
                    location.reload();                
                }
            });
        }
    }
</script>

@endsection