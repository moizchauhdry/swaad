@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Coupons</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('coupons.index')}}" class="btn btn-dark">Back</a>
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
                        <h3 class="card-title">Add Coupon</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('coupons.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>Name <span class="required-star">*</span></label>
                                   
                                        <div class="custom-file">
                                            <input type="text"  class="form-control" name="name"
                                                required>
                                           
                                        </div>
                                 
                                   
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>Coupon Type <span class="required-star">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <select class="form-control" name="type"
                                                required>
                                                <option value="">Select</option>
                                                <option value="amount">Amount</option>
                                                <option value="percentage">Percentage</option>
                                            </select>
                                           
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>Value <span class="required-star">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="number"  class="form-control" name="value"
                                                required>
                                           
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>Status <span class="required-star">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <select class="form-control" name="status"
                                                required>
                                                <option value="">Select</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                           
                                        </div>
                                    </div>
                                   
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
