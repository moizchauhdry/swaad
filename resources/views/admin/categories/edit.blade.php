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
                    <li class="breadcrumb-item"><a href="{{route('categories.index')}}" class="btn btn-dark">Back</a>
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
                        <h3 class="card-title">Edit Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('categories.update',$category->id)}}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Title <span class="required-star">*</span></label>
                                    <input type="text" name="title" class="form-control"
                                        placeholder="Enter Category Title" value="{{$category->title}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Title (gr)<span class="required-star">*</span></label>
                                    <input type="text" name="title_gr" class="form-control"
                                        placeholder="Enter Category Title (gr)" value="{{$category->title_gr}}"
                                        required>
                                </div>
                                <div class="form-group col-md-6 mb-4">
                                    <label>Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" id="image_url" class="custom-file-input" name="image_url"
                                                accept=".png, .jpg, .jpeg">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                    @if ($category->image_url != null && Storage::exists($category->image_url))
                                    <img src="{{ asset('storage/app/public/'.$category->image_url) }}" id="image"
                                        class="w-25 mt-2" />
                                    @else
                                    <img src="{{ asset('public/images/placeholder.png') }}" id="image"
                                        class="w-25 mt-2" />
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
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