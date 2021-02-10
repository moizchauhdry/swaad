<table id="orderTable" class="table-sm table-bordered order-table mt-2 mb-4 text-center" style="width: 100%">
    <thead class="bg-primary text-white">
        <tr>
            <th>{{session('lan') == 'en' ? 'Order #' : 'Bestellung #'}}</th>
            <th>{{session('lan') == 'en' ? 'First Name' : 'Vorname'}}</th>
            <th>{{session('lan') == 'en' ? 'Last Name' : 'Nachname'}}</th>
            <th>{{session('lan') == 'en' ? 'Order Date' : 'Bestelldatum'}}</th>
            <th>{{session('lan') == 'en' ? 'Order Status' : 'Bestellstatus'}}</th>
            <th>{{session('lan') == 'en' ? 'Net Total' : 'Nettosumme'}}</th>
            <th>{{session('lan') == 'en' ? 'Payment Status' : 'Zahlungsstatus'}}</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td> {{str_pad($order->id, 3, '0', STR_PAD_LEFT)}}</td>
            <td>{{$order->user->first_name}}</td>
            <td>{{$order->user->last_name}}</td>
            <td>{{date('d-m-Y', strtotime($order->created_at))}}</td>
            <td>
                @if ($order->order_status == 0) {{session('lan') == 'en' ? 'Pending' : 'steht aus'}}
                @elseif ($order->order_status == 1) {{session('lan') == 'en' ? 'Processing' : 'wird bearbeitet'}}
                @elseif ($order->order_status == 2) {{session('lan') == 'en' ? 'Shipping' : 'Versand'}}
                @elseif ($order->order_status == 3) {{session('lan') == 'en' ? 'Delivered' : 'Geliefert'}}
                @elseif ($order->order_status == 4) {{session('lan') == 'en' ? 'Cancelled' : 'Abgebrochen'}}
                @else {{session('lan') == 'en' ? 'Failed' : 'Gescheitert'}}
                @endif
            </td>
            <td>CHF {{ number_format((float) $order->net_total, 2, '.', '')}}</td>
            <td>
                @if ($order->payment_status == 0) {{session('lan') == 'en' ? 'Pending' : 'steht aus'}}
                @elseif ($order->payment_status == 1) {{session('lan') == 'en' ? 'Completed' : 'Abgeschlossen'}}
                @else {{session('lan') == 'en' ? 'Failed' : 'Gescheitert'}}
                @endif
            </td>
            <td>
                <a href="{{route('orderDetail',$order->id)}}" class="btn btn-primary btn-sm rounded">
                    <i class="fas fa-eye mr-1" aria-hidden="true"></i> {{session('lan') == 'en' ? 'View' : 'Aussicht'}}
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>