@extends('layouts.frontend')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">{{session('lan') == 'en' ? 'Order Detail' : 'Bestelldetails'}}</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row p-4">
        <div class="col-md-12">
            <h5 class="text-center">
                {{session('lan') == 'en' ? 'Order Detail #' : 'Bestelldetails #'}}{{str_pad($order->id, 3, '0', STR_PAD_LEFT)}}
            </h5>
        </div>
        <table class="table-sm table-bordered col-md-6">
            <tbody>
                <tr class="bg-light">
                    <th colspan="2" class="text-center">
                        {{session('lan') == 'en' ? 'Order Information' : 'Bestellinformationen'}}</th>
                </tr>
                <tr>
                    <th>{{session('lan') == 'en' ? 'Order ID' : 'Auftragsnummer'}}</th>
                    <td>{{str_pad($order->id, 3, '0', STR_PAD_LEFT)}}</td>
                </tr>
                <tr>
                    <th>{{session('lan') == 'en' ? 'Order Date' : 'Bestelldatum'}}</th>
                    <td>
                        {{date('M d, Y - l', strtotime($order->created_at))}}
                    </td>
                </tr>
                <tr>
                    <th>{{session('lan') == 'en' ? 'Order Time' : 'Bestellzeitpunkt'}}</th>
                    <td>
                        {{date('h:i:s A', strtotime($order->created_at))}}
                    </td>
                </tr>
                <tr>
                    <th>{{session('lan') == 'en' ? 'Order Status' : 'Bestellstatus'}}</th>
                    <td>
                        @if ($order->order_status == 0) {{session('lan') == 'en' ? 'Pending' : 'steht aus'}}
                        @elseif ($order->order_status == 1)
                        {{session('lan') == 'en' ? 'Processing' : 'wird bearbeitet'}}
                        @elseif ($order->order_status == 2) {{session('lan') == 'en' ? 'Shipping' : 'Versand'}}
                        @elseif ($order->order_status == 3) {{session('lan') == 'en' ? 'Delivered' : 'Geliefert'}}
                        @elseif ($order->order_status == 4) {{session('lan') == 'en' ? 'Cancelled' : 'Abgebrochen'}}
                        @else {{session('lan') == 'en' ? 'Failed' : 'Gescheitert'}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>{{session('lan') == 'en' ? 'Net Total' : 'Nettosumme'}}</th>
                    <td>CHF {{ number_format((float) $order->net_total, 2, '.', '')}}</td>
                </tr>
                <section>
                    <tr class="bg-light">
                        <th colspan="2" class="text-center">
                            {{session('lan') == 'en' ? 'Delivery Information' : 'Lieferinformationen'}}</th>
                    </tr>
                    <tr>
                        <th>{{session('lan') == 'en' ? 'Delivery Date' : 'Lieferdatum'}}</th>
                        <td>
                            {{date('M d, Y - l', strtotime($order->delivery_date))}}
                        </td>
                    </tr>
                    <tr>
                        <th>{{session('lan') == 'en' ? 'Delivery Time' : 'Lieferzeit'}}</th>
                        <td>
                            {{date('h:i:s A', strtotime($order->delivery_time))}}
                        </td>
                    </tr>
                    <tr>
                        <th>{{session('lan') == 'en' ? 'Delivery Address' : 'Lieferadresse'}}</th>
                        <td>
                            {{isset($order->delivery_address) ? $order->delivery_address : "-"}}
                        </td>
                    </tr>
                    <tr>
                        <th>{{session('lan') == 'en' ? 'Delivery Phone' : 'Liefertelefon'}}</th>
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
                    <th colspan="2" class="text-center">
                        {{session('lan') == 'en' ? 'Customer Information' : 'Kundeninformation'}}</th>
                </tr>
                <tr>
                    <th>{{session('lan') == 'en' ? 'Fisrt Name' : 'Vorname'}}</th>
                    <td>{{$order->user->first_name}}</td>
                </tr>
                <tr>
                    <th>{{session('lan') == 'en' ? 'Last Name' : 'Nachname'}}</th>
                    <td>{{$order->user->last_name}}</td>
                </tr>
                <tr>
                    <th>{{session('lan') == 'en' ? 'Email' : 'Email'}}</th>
                    <td>{{$order->user->email}}</td>
                </tr>
                <tr>
                    <th>{{session('lan') == 'en' ? 'Phone' : 'Telefon'}}</th>
                    <td>{{$order->user->phone_no}}</td>
                </tr>
                <tr>
                    <th>{{session('lan') == 'en' ? 'House #' : 'Haus #'}}</th>
                    <td>{{$order->user->home_no}}</td>
                </tr>
                <tr>
                    <th>{{session('lan') == 'en' ? 'City' : 'Stadt'}}</th>
                    <td>{{$order->user->city}}</td>
                </tr>
                <tr>
                    <th>{{session('lan') == 'en' ? 'Address' : 'Adresse'}}</th>
                    <td>{{$order->user->address}}</td>
                </tr>
                <tr>
                    <th>{{session('lan') == 'en' ? 'Post code' : 'Postleitzahl'}}</th>
                    <td>{{$order->user->zip_code}}</td>
                </tr>
                <tr>
                    <th>{{session('lan') == 'en' ? 'Order Notes' : 'Bestellhinweise'}}</th>
                    <td>{{$order->order_notes}}</td>
                </tr>

                <section>
                    <tr class="bg-light">
                        <th colspan="2" class="text-center">
                            {{session('lan') == 'en' ? 'Paymemt Information' : 'Paymemt Informationen'}}</th>
                    </tr>
                    <tr>
                        <th>{{session('lan') == 'en' ? 'Payment Method' : 'Bezahlverfahren'}}</th>
                        <td>
                            @if ($order->payment_method == 0)
                            <span
                                class="badge badge-primary">{{session('lan') == 'en' ? 'CASH ON DELIVERY' : 'BARZAHLUNG BEI LIEFERUNG'}}</span>
                            @elseif ($order->payment_method == 1)
                            <span
                                class="badge badge-primary">{{session('lan') == 'en' ? 'PAYMENT WITH CARD' : 'ZAHLUNG MIT KARTE'}}</span>
                            @else <span
                                class="badge badge-danger">{{session('lan') == 'en' ? 'FAIL' : 'SCHEITERN'}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>{{session('lan') == 'en' ? 'Payment Status' : 'Zahlungsstatus'}}</th>
                        <td>
                            @if ($order->payment_status == 0)
                            <span
                                class="badge badge-warning">{{session('lan') == 'en' ? 'Pending' : 'steht aus'}}</span>
                            @elseif ($order->payment_status == 1)
                            <span
                                class="badge badge-success">{{session('lan') == 'en' ? 'Completed' : 'Abgeschlossen'}}</span>
                            @else
                            <span
                                class="badge badge-danger">{{session('lan') == 'en' ? 'Failed' : 'Gescheitert'}}</span>
                            @endif
                        </td>
                    </tr>
                </section>
            </tbody>
        </table>
        <table class="table-sm table-bordered table-striped w-100 mt-4">
            <thead>
                <tr>
                    <th>{{session('lan') == 'en' ? 'Sr #' : 'Sr #'}}</th>
                    <th>{{session('lan') == 'en' ? 'Item' : 'Artikel'}}</th>
                    <th>{{session('lan') == 'en' ? 'Menu' : 'Speisekarte'}}</th>
                    <th>{{session('lan') == 'en' ? 'Item Price' : 'Stückpreis'}}</th>
                    <th>{{session('lan') == 'en' ? 'Quantity' : 'Menge'}}</th>
                    <th>{{session('lan') == 'en' ? 'Total' : 'Gesamt'}}</th>
                </tr>
            </thead>
            <tbody>
                @php $count=1; @endphp
                @foreach($orderItems as $item)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>
                        @if (session('lan') == 'en')
                        {{ $item->product->title }}
                        @else
                        {{ $item->product->title_gr}}
                        @endif
                    </td>
                    <td>
                        @if (session('lan') == 'en')
                        {{ $item->product->category->title }}
                        @else
                        {{ $item->product->category->title_gr}}
                        @endif
                    </td>
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