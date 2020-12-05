@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Level 1 Category</h1>
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
                                    <input type="text" id="title" maxlength="70" class="form-control" name="title"
                                        value="{{$category->title}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Status <span class="required-star">*</span></label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ ($category->is_active == '1')? 'selected':'' }}>Active
                                        </option>
                                        <option value="0" {{ ($category->is_active == '0')? 'selected':'' }}>In Active
                                        </option>
                                    </select>
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
                                    @if ($category->image != null && Storage::exists($category->image))
                                    <img src="{{ asset('storage/app/public/'.$category->image) }}" id="image"
                                        class="w-25 mt-2" />
                                    @else
                                    <img src="{{ asset('public/images/placeholder.png') }}" id="image"
                                        class="w-25 mt-2" />
                                    @endif
                                </div>

                            </div>

                            <fieldset class="border p-4">
                                <legend class="w-auto">Specification</legend>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="checkbox-inline">Has Colors?</label>&nbsp;
                                        @if ($category->has_colors == "0")
                                        <input name="has_colors" type="checkbox" class="" data-toggle="toggle">
                                        <input type="hidden" name="has_colors" id="has_colors"
                                            value="{{$category->has_colors}}">
                                        @else
                                        <input name="has_colors" type="checkbox" class="" checked data-toggle="toggle">
                                        <input type="hidden" name="has_colors" id="has_colors"
                                            value="{{$category->has_colors}}">
                                        @endif
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label class="checkbox-inline">Has Sizes?</label>&nbsp;
                                        @if ($category->has_sizes == "0")
                                        <input name="has_sizes" type="checkbox" class="" data-toggle="toggle">
                                        <input type="hidden" name="has_sizes" id="has_sizes"
                                            value="{{$category->has_sizes}}">
                                        @else
                                        <input name="has_sizes" type="checkbox" class="" checked data-toggle="toggle">
                                        <input type="hidden" name="has_sizes" id="has_sizes"
                                            value="{{$category->has_sizes}}">
                                        @endif
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label class="checkbox-inline">Has Brands?</label>&nbsp;
                                        @if ($category->has_brands == "0")
                                        <input name="has_brands" type="checkbox" class="" data-toggle="toggle">
                                        <input type="hidden" name="has_brands" id="has_brands"
                                            value="{{$category->has_brands}}">
                                        @else
                                        <input name="has_brands" type="checkbox" class="" checked data-toggle="toggle">
                                        <input type="hidden" name="has_brands" id="has_brands"
                                            value="{{$category->has_brands}}">
                                        @endif
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label class="checkbox-inline">Has Manufacturer?</label>&nbsp;
                                        @if ($category->has_manufacturers == "0")
                                        <input name="has_manufacturers" type="checkbox" class="" data-toggle="toggle">
                                        <input type="hidden" name="has_manufacturers" id="has_manufacturers"
                                            value="{{$category->has_manufacturers}}">
                                        @else
                                        <input name="has_manufacturers" type="checkbox" class="" checked
                                            data-toggle="toggle">
                                        <input type="hidden" name="has_manufacturers" id="has_manufacturers"
                                            value="{{$category->has_manufacturers}}">
                                        @endif
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label class="checkbox-inline">Has Frequencies?</label>&nbsp;
                                        @if ($category->has_frequencies == "0")
                                        <input name="has_frequencies" type="checkbox" class="" data-toggle="toggle">
                                        <input type="hidden" name="has_frequencies" id="has_frequencies"
                                            value="{{$category->has_frequencies}}">
                                        @else
                                        <input name="has_frequencies" type="checkbox" class="" checked
                                            data-toggle="toggle">
                                        <input type="hidden" name="has_frequencies" id="has_frequencies"
                                            value="{{$category->has_frequencies}}">
                                        @endif
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label class="checkbox-inline">Has Lenses?</label>&nbsp;
                                        @if ($category->has_lenses == "0")
                                        <input name="has_lenses" type="checkbox" class="" data-toggle="toggle">
                                        <input type="hidden" name="has_lenses" id="has_lenses"
                                            value="{{$category->has_lenses}}">
                                        @else
                                        <input name="has_lenses" type="checkbox" class="" checked data-toggle="toggle">
                                        <input type="hidden" name="has_lenses" id="has_lenses"
                                            value="{{$category->has_lenses}}">
                                        @endif
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Is Featured?</label>&nbsp;
                                        <input name="is_featured" type="checkbox" class="" @if ($category->is_featured
                                        == 1)
                                        checked @endif data-toggle="toggle">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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

    $('input[name="has_colors"]').change(function () {
        if ($(this).is(":checked")) {
            $('input#has_colors').val('1');
        } else {
            $('input#has_colors').val('0');
        }
    }); 

    $('input[name="has_sizes"]').change(function () {
        if ($(this).is(":checked")) {
            $('input#has_sizes').val('1');
        } else {
            $('input#has_sizes').val('0');
        }
    }); 

    $('input[name="has_color_no"]').change(function () {
        if ($(this).is(":checked")) {
            $('input#has_color_no').val('1');
        } else {
            $('input#has_color_no').val('0');
        }
    }); 
    
    $('input[name="has_brands"]').change(function () {
        if ($(this).is(":checked")) {
            $('input#has_brands').val('1');
        } else {
            $('input#has_brands').val('0');
        }
    }); 

    $('input[name="has_manufacturers"]').change(function () {
        if ($(this).is(":checked")) {
            $('input#has_manufacturers').val('1');
        } else {
            $('input#has_manufacturers').val('0');
        }
    }); 

    $('input[name="has_frequencies"]').change(function () {
        if ($(this).is(":checked")) {
            $('input#has_frequencies').val('1');
        } else {
            $('input#has_frequencies').val('0');
        }
    }); 

    $('input[name="has_lenses"]').change(function () {
        if ($(this).is(":checked")) {
            $('input#has_lenses').val('1');
        } else {
            $('input#has_lenses').val('0');
        }
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