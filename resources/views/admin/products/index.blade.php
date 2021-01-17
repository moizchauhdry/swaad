@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Products</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('products.create')}}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus mr-1" aria-hidden="true"></i> Add Product</a></li>
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
                            Product List (Total Products : {{$products->count()}})
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="productsTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr #</th>
                                    <th>Title</th>
                                    <th>Title [de]</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Description [de]</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 1; @endphp
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{$count ++}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->title_gr}}</td>
                                    <td>
                                        @if ($product->image_url != NULL && Storage::exists($product->image_url))
                                        <img src="{{asset('storage/app/public/'.$product->image_url)}}" id="image"
                                            style="width:150px" />
                                        @else
                                        <img src=" {{asset('public/admin/images/placeholder.png') }}" id="image"
                                            style="width:150px" />
                                        @endif
                                    </td>
                                    <td>CHF {{ number_format((float) $product->price, 2, '.', '')}}</td>

                                    <td>{{$product->category->title}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->description_gr}}</td>

                                    <td>
                                        @if ($product->status == 1)
                                        <span class=" badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('products.edit',$product->id)}}"
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
      $("#productsTable").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
</script>
@endsection