@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Orders</h1>
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
                            Orders List (Total Orders : {{$orders->count()}})
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" id="orders">
                        @include('admin.orders._index')
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
      $("#orderTable").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });

    var indexList = "{{$orders->count()}}";
    var restHtml;
    setInterval(function(){
        $.ajax({
            type: "get",
            url: '{{route('orders.check')}}',
            data: {_token: $('meta[name="csrf-token"]').attr('content'),indexList: indexList},
           success: function (response) {
                console.log(response.status);
                if(response.status)
                {
                    $('#orders').empty();
                    indexList = response.count;
                    $('#orders').html(response.html);
                    playSound();
                    $("#orderTable").DataTable({
                        "responsive": true,
                        "autoWidth": false,
                    });
                }
                else{


                }
            }
        });
    }, 5000);

    function playSound()
    {
        var audio = new Audio('{{asset("public/audio/notify.mp3")}}');
        audio.play();
    }
</script>
@endsection