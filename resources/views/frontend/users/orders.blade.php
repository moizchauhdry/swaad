@extends('layouts.frontend')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">{{session('lan') == 'en' ? 'orders' : 'Aufträge'}}</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section contact-section">
    <div class="container">
        @if ($orders->count() > 0)
        <ul class=" nav nav-pills nav-fill" style="padding: 10px">
            <li class="nav-item">
                <button class="btn btn-primary btn-secondary order_status shadow rounded m-2" id="order_status_0"
                    data-id="0">{{session('lan') == 'en' ? 'Pending' : 'steht aus'}}</button>
            </li>
            <li class="nav-item">
                <button class="btn btn-secondary order_status shadow rounded m-2" id="order_status_1"
                    data-id="1">{{session('lan') == 'en' ? 'Processing' : 'wird bearbeitet'}}</button>
            </li>
            <li class="nav-item">
                <button class="btn btn-secondary order_status shadow rounded m-2" id="order_status_2"
                    data-id="2">{{session('lan') == 'en' ? 'Shipping' : 'Versand'}}</button>
            </li>
            <li class="nav-item">
                <button class="btn btn-secondary order_status shadow rounded m-2" id="order_status_3"
                    data-id="3">{{session('lan') == 'en' ? 'Delivered' : 'Geliefert'}}</button>
            </li>
            <li class="nav-item">
                <button class="btn btn-secondary order_status shadow rounded m-2" id="order_status_4"
                    data-id="4">{{session('lan') == 'en' ? 'Cancelled' : 'Abgebrochen'}}</button>
            </li>
        </ul>
        @endif

        <div id="orders_data">
            @if ($orders->count() > 0)
            @include('frontend.users._orders')
            @else
            <div class="col-md-8 offset-md-2">
                <div class="text-dark text-center mb-5">
                    <a class="navbar-brand" href="{{route('index')}}">Swaad</a>
                    <p>{{session('lan') == 'en' ? 'There are no orders placed yet.' : 'Es sind noch keine Bestellungen eingegangen.'}}
                    </p>
                    <a href="{{route('products')}}"
                        class="btn btn-primary">{{session('lan') == 'en' ? 'Continue Shopping' : 'Mit dem Einkaufen fortfahren'}}</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

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

    $(function () {
        $("#orderTable").DataTable({
            "responsive": true,
            "autoWidth": false,
            "searching":false,
            "paging":   false,
            "ordering": false,
            "info":     false
        });
    });
    
</script>
@endsection