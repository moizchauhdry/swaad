<?php
    // use Mike42\Escpos\PrintConnectors\FilePrintConnector;
    // use Mike42\Escpos\Printer;
    // use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
    // use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
    // use Mike42\Escpos\Experimental\Unifont\UnifontPrintBuffer;
    // use Mike42\Escpos\PrintConnectors\CupsPrintConnector;
    // use Mike42\Escpos\CapabilityProfile;

    // try {         
    //     $connector = new WindowsPrintConnector("smb://DESKTOP-F3ETIGJ/TM-T88V");
    //     dd($connector);
    //     $printer = new Printer($connector);
    //     $printer->initialize();
    //     $printer -> text("Hello World!\n");
    //     $printer -> cut();
    //     $printer -> close();
    // } catch (Exception $e) {
    //     echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
    // }
?>
<table id="orderTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Order Id</th>
            <th>First Name</th>
            <th>Last Name</th>
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
            <td>{{isset($order->user->first_name) ? $order->user->first_name : ''}}</td>
            <td>{{isset($order->user->last_name) ? $order->user->last_name : ''}}</td>
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
            <td>CHF {{ number_format((float) $order->net_total, 2, '.', '')}}</td>
            <td>
                @if ($order->payment_method == 0)
                <span class="badge badge-primary">CASH ON DELIVERY</span>
                @elseif ($order->payment_method == 1)
                <span class="badge badge-primary">PAYMENT WITH CARD</span>
                @else <span class="badge badge-danger">FAIL</span>
                @endif
            </td>
            <td>
                @if ($order->payment_status == 0)
                <span class="badge badge-warning">PENDING</span>
                @elseif ($order->payment_status == 1)
                <span class="badge badge-success">COMPLETE</span>
                @else
                <span class="badge badge-danger">FAIL</span>
                @endif
            </td>
            <td>
                <a href="{{route('orders.detail',$order->id)}}" class="btn btn-primary btn-xs">
                    <i class="fas fa-eye mr-1" aria-hidden="true"></i> View
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>