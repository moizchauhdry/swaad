<table id="orderTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Order Id</th>
            <th>User Name</th>
            <th>Order Date</th>
            <th>Order Status</th>
            <th>Net Total</th>
            <th>Payment Method</th>
            <th>Payment Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $count = 1; ?>
        @foreach ($orders as $order)
        <tr>
            <td>{{$count ++}}</td>
            <td> {{str_pad($order->id, 3, '0', STR_PAD_LEFT)}}</td>
            <td>{{$order->user->name}}</td>
            <td>{{date('d-m-Y', strtotime($order->created_at))}}</td>
            <td>
                @if ($order->order_status == 0) Pending
                @elseif ($order->order_status == 1) Processing
                @elseif ($order->order_status == 2) Shipped
                @elseif ($order->order_status == 3) Delivered
                @elseif ($order->order_status == 4) Cancelled
                @else Failed
                @endif
            </td>
            <td>€ {{ number_format((float) $order->net_total, 2, '.', '')}}</td>
            <td>{{isset($order->payment_method) ? $order->payment_method : 'Unknown'}}</td>
            <td>
                @if ($order->payment_status == 0) Pending
                @elseif ($order->payment_status == 1) Completed
                @else Failed
                @endif
            </td>
            <td>
                <a href="{{route('orders.detail',$order->id)}}" class="btn btn-primary btn-sm">
                    <i class="fas fa-eye mr-1" aria-hidden="true"></i> View
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>