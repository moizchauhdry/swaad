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
                    <li class="breadcrumb-item"><a href="{{route('products.index')}}" class="btn btn-dark">Back</a>
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
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Title <span class="required-star">*</span></label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Title"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Title (gr) <span class="required-star">*</span></label>
                                    <input type="text" name="title_gr" class="form-control"
                                        placeholder="Enter Title (gr)" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Image <span class="required-star">*</span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image_url" id="image_url"
                                                accept=".png, .jpg, .jpeg" required>
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                    <img src="" id="image" class="hidden w-25 mt-2" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Category <span class="required-star">*</span></label>
                                    <select name="category_id" id="category_id" class="form-control custom-select"
                                        required>
                                        <option value="" selected>Select ... </option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}" selected>{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Price <span class="required-star">*</span></label>
                                    <input type="number" name="price" class="form-control" placeholder="Enter Price"
                                        min="0" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Description <span class="required-star">*</span></label>
                                    <textarea name="description" id="description" cols="30" rows="5"
                                        class="form-control" required></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Description (gr) <span class="required-star">*</span></label>
                                    <textarea name="description_gr" id="description" cols="30" rows="5"
                                        class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save & Upload</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection


@section('scripts')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image').attr('src', e.target.result);
                $('#image').removeClass("hidden");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image_url").change(function () {
        readURL(this);
    });

    // Get Input File Name
    $('.custom-file input').change(function (e) {
        var files = [];
        for (var i = 0; i < $(this)[0].files.length; i++) {
            files.push($(this)[0].files[i].name);
        }
        $(this).next('.custom-file-label').html(files.join(','));
    });
</script>

@endsection