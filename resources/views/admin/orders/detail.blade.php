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
                        <table class="table table-sm table-bordered">
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
                                    <td>€ {{ number_format((float) $order->net_total, 2, '.', '')}}</td>
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
                                    <td> € {{$item->product->price}} </td>
                                    <td> x {{$item->quantity}}</td>
                                    <td>€ {{$item->product->price * $item->quantity}}</td>
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
        <form action="">
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
                            <option value="0">Pending</option>
                            <option value="1">Processing</option>
                            <option value="2">Shipped</option>
                            <option value="3">Delivered</option>
                            <option value="4">Cancelled</option>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="">Payment Status <span class="text-danger">*</span></label>
                        <select name="payment_status" id="payment_status" class="form-control" required>
                            <option value="0">Pending</option>
                            <option value="1">Complete</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm">Save & Update</button>
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