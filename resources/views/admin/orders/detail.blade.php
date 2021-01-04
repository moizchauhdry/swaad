@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Order Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{route('orders.index')}}" class="btn btn-dark">
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
                <div class="card col-md-12">
                    <div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm float-right mt-3 mr-4" data-toggle="modal"
                            data-target="#editOrderDetailModal"> <i class="far fa-edit" aria-hidden="true"></i> Edit
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-bordered col-md-6">
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
                                </tbody>
                            </table>
                            <table class="table table-bordered col-md-6">
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
                                        <th>Postal/Zipcode</th>
                                        <td>{{$order->user->zip_code}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card">
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
                                    <td> CHF {{$item->product->price}} </td>
                                    <td> x {{$item->quantity}}</td>
                                    <td>CHF {{$item->product->price * $item->quantity}}</td>
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
    <!-- /.container-fluid -->
</section>
<!-- /.content -->


<!-- EDIT ORDER DETAIL MODAL -->
<div class="modal fade" id="editOrderDetailModal" tabindex="-1" aria-labelledby="editOrderDetailModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('updateOrderStatus',$order->id)}}" method="POST"> @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOrderDetailModalLabel">Order Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 form-group">
                        <label for="">Order Status <span class="text-danger">*</span></label>
                        <select name="order_status" id="order_status" class="form-control" required>
                            <option {{ ($order->order_status == "0"? "selected":"") }} value="0">Pending</option>
                            <option {{ ($order->order_status == "1"? "selected":"") }} value="1">Processing</option>
                            <option {{ ($order->order_status == "2"? "selected":"") }} value="2">Shipped</option>
                            <option {{ ($order->order_status == "3"? "selected":"") }} value="3">Delivered</option>
                            <option {{ ($order->order_status == "4"? "selected":"") }} value="4">Cancelled</option>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="">Payment Status <span class="text-danger">*</span></label>
                        <select name="payment_status" id="payment_status" class="form-control" required>
                            <option {{ ($order->payment_status == "0"? "selected":"") }} value="0">Pending</option>
                            <option {{ ($order->payment_status == "1"? "selected":"") }} value="1">Complete</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Save & Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
</script>
@endsection