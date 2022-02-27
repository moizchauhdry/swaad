@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Site Configuration</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url()->previous()}}" class="btn btn-dark">Back</a>
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
                        <h3 class="card-title">Site Configuration</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('site-configuration.update')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Store Timing <span class="required-star">*</span></label>
                                    <textarea name="store_timing" id="store_timing" cols="30" rows="5"
                                        class="form-control">{{isset($site->store_timing) ? $site->store_timing : ''}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Reservation Accepted Message - EMAIL <span
                                            class="required-star">*</span></label>
                                    <textarea name="rsv_accepted_msg" id="rsv_accepted_msg" cols="30" rows="5"
                                        class="form-control">{{isset($site->rsv_accepted_msg) ? $site->rsv_accepted_msg : ''}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Reservation Rejected Message - EMAIL <span
                                            class="required-star">*</span></label>
                                    <textarea name="rsv_rejected_msg" id="rsv_rejected_msg" cols="30" rows="5"
                                        class="form-control">{{isset($site->rsv_rejected_msg) ? $site->rsv_rejected_msg : ''}}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save & Update</button>
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
        $("#home_page_image").change(function () {
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
