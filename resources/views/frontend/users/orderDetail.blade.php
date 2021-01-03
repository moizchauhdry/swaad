@extends('layouts.frontend')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">Order Detail</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card col-md-12">
                <!-- /.card-header -->
                <h3 class="card-title text-center p-2">
                    Order Detail #{{str_pad($order->id, 3, '0', STR_PAD_LEFT)}}
                </h3>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Order ID</th>
                                <td>{{str_pad($order->id, 3, '0', STR_PAD_LEFT)}}</td>
                            </tr>
                            <tr>
                                <th>Order Date</th>
                                <td>
                                    {{date('M d, Y - l', strtotime($order->created_at))}}
                                </td>
                            </tr>
                            <tr>
                                <th>Order Time</th>
                                <td>
                                    {{date('h:i:s A', strtotime($order->created_at))}}
                                </td>
                            </tr>
                            <tr>
                                <th>Order Status</th>
                                <td>
                                    @if ($order->order_status == 0) Pending
                                    @elseif ($order->order_status == 1) Processing
                                    @elseif ($order->order_status == 2) Shipped
                                    @elseif ($order->order_status == 3) Delivered
                                    @elseif ($order->order_status == 4) Cancelled
                                    @else Failed
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Net Total</th>
                                <td>CHS {{ number_format((float) $order->net_total, 2, '.', '')}}</td>
                            </tr>
                            <tr>
                                <th>Payment Method</th>
                                <td>{{isset($order->payment_method) ? $order->payment_method : 'Unknown'}}</td>
                            </tr>
                            <tr>
                                <th>Payment Status</th>
                                <td>
                                    @if ($order->payment_status == 0) Pending
                                    @elseif ($order->payment_status == 1) Completed
                                    @else Failed
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card mt-4 mb-4">
                <div class="card-header">
                    <h3 class="card-title">
                        Total Order Items : {{$orderProductsCount}}
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr #</th>
                                <th>Title</th>
                                <th>Item Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count=1; @endphp
                            @foreach($orderItems as $item)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $item->product->title }}</td>
                                <td> CHS {{$item->product->price}} </td>
                                <td> x {{$item->quantity}}</td>
                                <td>CHS {{$item->product->price * $item->quantity}}</td>
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

@endsection