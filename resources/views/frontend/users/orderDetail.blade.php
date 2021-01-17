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
    <div class="row p-4">
        <div class="col-md-12">
            <h5 class="text-center">Order Detail #{{str_pad($order->id, 3, '0', STR_PAD_LEFT)}}</h5>
        </div>
        <table class="table-sm table-bordered col-md-6">
            <tbody>
                <tr class="bg-light">
                    <th colspan="2" class="text-center">Order Information</th>
                </tr>
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
                    <td>CHF {{ number_format((float) $order->net_total, 2, '.', '')}}</td>
                </tr>
                <section>
                    <tr class="bg-light">
                        <th colspan="2" class="text-center">Delivery Information</th>
                    </tr>
                    <tr>
                        <th>Delivery Date</th>
                        <td>
                            {{date('M d, Y - l', strtotime($order->delivery_date))}}
                        </td>
                    </tr>
                    <tr>
                        <th>Delivery Time</th>
                        <td>
                            {{date('h:i:s A', strtotime($order->delivery_time))}}
                        </td>
                    </tr>
                    <tr>
                        <th>Delivery Address</th>
                        <td>
                            {{isset($order->delivery_address) ? $order->delivery_address : "-"}}
                        </td>
                    </tr>
                    <tr>
                        <th>Delivery Phone</th>
                        <td>
                            {{isset($order->delivery_phone) ? $order->delivery_phone : "-"}}
                        </td>
                    </tr>
                </section>
            </tbody>
        </table>
        <table class="table-sm table-bordered col-md-6">
            <tbody>
                <tr class="bg-light">
                    <th colspan="2" class="text-center">Customer Information</th>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{$order->user->name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$order->user->email}}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{$order->user->phone_no}}</td>
                </tr>
                <tr>
                    <th>House #</th>
                    <td>{{$order->user->home_no}}</td>
                </tr>
                <tr>
                    <th>Street #</th>
                    <td>{{$order->user->address}}</td>
                </tr>
                <tr>
                    <th>Post code</th>
                    <td>{{$order->user->zip_code}}</td>
                </tr>
                <tr>
                    <th>Order Notes</th>
                    <td>{{$order->order_notes}}</td>
                </tr>

                <section>
                    <tr class="bg-light">
                        <th colspan="2" class="text-center">Paymemt Information</th>
                    </tr>
                    <tr>
                        <th>Payment Method</th>
                        <td>
                            @if ($order->payment_method == 0)
                            <span class="badge badge-primary">CASH ON DELIVERY</span>
                            @elseif ($order->payment_method == 1)
                            <span class="badge badge-primary">PAYMENT WITH CARD</span>
                            @else <span class="badge badge-danger">FAIL</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Payment Status</th>
                        <td>
                            @if ($order->payment_status == 0)
                            <span class="badge badge-warning">PENDING</span>
                            @elseif ($order->payment_status == 1)
                            <span class="badge badge-success">COMPLETE</span>
                            @else
                            <span class="badge badge-danger">FAIL</span>
                            @endif
                        </td>
                    </tr>
                </section>
            </tbody>
        </table>
        <table class="table-sm table-bordered table-striped w-100 mt-4">
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
                    <td> CHF {{$item->product->price}} </td>
                    <td> x {{$item->quantity}}</td>
                    <td>CHF {{$item->product->price * $item->quantity}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection