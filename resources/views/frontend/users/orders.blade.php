@extends('layouts.frontend')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">Orders</h1>
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding:25px">
    <div>
        <ul class="nav nav-pills nav-fill" style="padding: 10px">
            <li class="nav-item">
                <button class="btn order_status" id="order_status_0" data-id="0">Pending</button>
            </li>
            <li class="nav-item">
                <button class="btn order_status" id="order_status_1" data-id="1">Processing</button>
            </li>
            <li class="nav-item">
                <button class="btn order_status" id="order_status_2" data-id="2">Shipped</button>
            </li>
            <li class="nav-item">
                <button class="btn order_status" id="order_status_3" data-id="3">Delivered</button>
            </li>
            <li class="nav-item">
                <button class="btn order_status" id="order_status_4" data-id="4">Cancelled</button>
            </li>
        </ul>
    </div>

    <div id="orders_data">
        @include('frontend.users._orders')
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(".order_status").click(function () { 
        var order_status = $(this).data('id');
        
        if (order_status == 0) {
            $('#order_status_0').addClass("btn-primary")
            $('#order_status_1').removeClass("btn-primary")
            $('#order_status_2').removeClass("btn-primary")
            $('#order_status_3').removeClass("btn-primary")
            $('#order_status_4').removeClass("btn-primary")
        } else if (order_status == 1) {
            $('#order_status_0').removeClass("btn-primary")
            $('#order_status_1').addClass("btn-primary")
            $('#order_status_2').removeClass("btn-primary")
            $('#order_status_3').removeClass("btn-primary")
            $('#order_status_4').removeClass("btn-primary")
        } else if (order_status == 2) {
            $('#order_status_0').removeClass("btn-primary")
            $('#order_status_1').removeClass("btn-primary")
            $('#order_status_2').addClass("btn-primary")
            $('#order_status_3').removeClass("btn-primary")
            $('#order_status_4').removeClass("btn-primary")
        } else if (order_status == 3) {
            $('#order_status_0').removeClass("btn-primary")
            $('#order_status_1').removeClass("btn-primary")
            $('#order_status_2').removeClass("btn-primary")
            $('#order_status_3').addClass("btn-primary")
            $('#order_status_4').removeClass("btn-primary")
        } else if (order_status == 4) {
            $('#order_status_0').removeClass("btn-primary")
            $('#order_status_1').removeClass("btn-primary")
            $('#order_status_2').removeClass("btn-primary")
            $('#order_status_3').removeClass("btn-primary")
            $('#order_status_4').addClass("btn-primary")
        } 

        $.ajax({    
            method: "POST",
            url: '{{route('getOrdersByStatus')}}',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'order_status': order_status,
            },
            success: function (response) {
                console.log(response)
                $("#orders_data").html(response);

            },
        });
    });
    
</script>
@endsection