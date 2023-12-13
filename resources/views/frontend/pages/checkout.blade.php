@extends('layouts.frontend')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread"> {{session('lan') == 'en' ? 'Checkout' : 'Überprüfen'}}</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <form action="{{route('checkout.store')}}" method="POST" class="billing-form" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-xl-7 ftco-animate">
                    <fieldset class="border p-4">
                        <legend class="w-auto text-dark"><small>
                                {{session('lan') == 'en' ? 'Customer Information' : 'Kundeninformation'}}</small>
                        </legend>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">{{session('lan') == 'en' ? 'First Name' : 'Vorname'}}</label>
                                <input type="text" class="form-control" name="chk_first_name" placeholder=""
                                    value="{{$user->first_name}}" maxlength="50" required>
                                @error('chk_first_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">{{session('lan') == 'en' ? 'Last Name' : 'Nachname'}}</label>
                                <input type="text" class="form-control" name="chk_last_name" placeholder=""
                                    value="{{$user->last_name}}" maxlength="50" required>
                                @error('chk_last_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">{{session('lan') == 'en' ? 'Phone' : 'Telefon'}}</label>
                                <input type="text" class="form-control" name="chk_phone_no" placeholder=""
                                    value="{{$user->phone_no}}" maxlength="15" required>
                                @error('chk_phone_no')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">{{session('lan') == 'en' ? 'Email' : 'Email'}}</label>
                                <input type="text" class="form-control" name="chk_email" placeholder=""
                                    value="{{$user->email}}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="streetaddress">{{session('lan') == 'en' ? 'Address' : 'Adresse'}}</label>
                                <input type="text" class="form-control" name="chk_address" placeholder=""
                                    value="{{$user->address}}" maxlength="50" required>
                                @error('chk_address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="streetaddress">{{session('lan') == 'en' ? 'House #' : 'Haus #'}}</label>
                                <input type="text" class="form-control" name="chk_house_no" placeholder=""
                                    value="{{$user->home_no}}" maxlength="50" required>
                                @error('chk_house_no')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="streetaddress">{{session('lan') == 'en' ? 'City' : 'Stadt'}}</label>
                                <input type="text" class="form-control" name="chk_city" placeholder=""
                                    value="{{$user->city}}" maxlength="50" required>
                                @error('chk_city')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    for="streetaddress">{{session('lan') == 'en' ? 'Post code' : 'Postleitzahl'}}</label>
                                <input type="text" class="form-control" name="chk_post_code" placeholder=""
                                    value="{{$user->zip_code}}" disabled>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="border p-4 mt-4">
                        <legend class="w-auto text-dark"><small>
                                {{session('lan') == 'en' ? 'Delivery Information' : 'Lieferinformationen'}}</small>
                        </legend>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label
                                        for="streetaddress">{{session('lan') == 'en' ? 'Delivery Date' : 'Lieferdatum'}}
                                        <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="dlv_date" id="dlv_date" placeholder=""
                                        value="{{date("Y-m-d")}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    $timestamp = strtotime(date("H:i")) + 60*55;
                                    $time = date("H:i", $timestamp);
                                ?>
                                <div class="form-group">
                                    <label for="">{{session('lan') == 'en' ? 'Delivery Time' : 'Lieferzeit'}} <span
                                            class="text-danger">*</span></label>
                                    <input type="time" class="form-control" name="dlv_time" id="dlv_time" placeholder=""
                                        value="{{$time}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{session('lan') == 'en' ? 'Delivery Address' : 'Lieferadresse'}}
                                        <small>(optional)</small></label>
                                    <input type="text" class="form-control" name="dlv_address" id="dlv_address"
                                        placeholder="" value="{{old('dlv_address')}}" maxlength="150">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{session('lan') == 'en' ? 'Delivery Phone' : 'Liefertelefon'}}
                                        <small>(optional)</small></label>
                                    <input type="text" class="form-control" name="dlv_phone" id="dlv_phone"
                                        placeholder="" value="{{old('dlv_phone')}}" maxlength="150">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label
                                        for="streetaddress">{{session('lan') == 'en' ? 'Order Notes' : 'Bestellhinweise'}}
                                        <small>(optional)</small></label>
                                    <textarea name="comments" id="" cols="30" rows="8" class="form-control"
                                        maxlength="150">{{old('comments')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col-xl-5">
                    <div class="row mt-1 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">
                                    {{session('lan') == 'en' ? 'Cart Total' : 'Warenkorb insgesamt'}}</h3>
                                <p class="d-flex">
                                    <span>{{session('lan') == 'en' ? 'Subtotal' : 'Zwischensumme'}}</span>
                                    <span>CHF {{ number_format((float)Cart::getSubTotal(), 2, '.', '')}}</span>
                                </p>
                                <p class="d-flex">
                                    <span>{{session('lan') == 'en' ? 'Delivery' : 'Lieferung'}}</span>
                                    <span>CHF 0.00</span>
                                </p>
                                <p class="d-flex">
                                    <span> {{session('lan') == 'en' ? 'Discount' : 'Rabatt'}}</span>
                                    <span>CHF 0.00</span>
                                </p>
                                <p class="d-flex">
                                    <span> {{session('lan') == 'en' ? 'Apply Coupon' : 'Anwenden Coupon'}}</span>
                                    <span>
                                        <form style="float:left;">
                                            <input type="text" name="coupon" id="coupon_code">
                                            <p id="coupon_error" style="color:red"></p>
                                        </form>
                                    </span>
                                </p>
                                <p class="d-flex">
                                    <span> </span>
                                    <span>
                                        <a class="btn btn-primary btn-sm" onclick="ApplyCoupon()" style="color: white;">Apply</a>
                                    </span>
                                </p>
                                <hr>
                                <p class="d-flex total-price">
                                    <span>{{session('lan') == 'en' ? 'Total' : 'Gesamt'}}</span>
                                    <span>CHF {{ number_format((float)Cart::getTotal(), 2, '.', '')}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cart-detail p-3 p-md-4">
                                <h3 class="billing-heading mb-4">
                                    {{session('lan') == 'en' ? 'Payment Method' : 'Bezahlverfahren'}}</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="chk_payment_method" class="mr-2" value="0"
                                                    required>{{session('lan') == 'en' ? 'CASH ON DELIVERY' : 'BARZAHLUNG BEI LIEFERUNG'}}</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="chk_payment_method" class="mr-2" value="1"
                                                    required>{{session('lan') == 'en' ? 'PAYMENT WITH CARD' : 'ZAHLUNG MIT KARTE'}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="" class="mr-2" required>
                                                {{session('lan') == 'en' ? 'I have read and accept the' : 'Ich habe das gelesen und akzeptiert'}}<a
                                                    href="{{route('termsCondition')}}" target="_blank">
                                                    {{session('lan') == 'en' ? 'Terms & conditions' : 'Terms & Bedingungen'}}</a></label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary py-3 px-4">
                                    {{session('lan') == 'en' ? 'Place an Order' : 'Eine Bestellung aufgeben'}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</section> <!-- .section -->
@endsection
@section('scripts')
<script>
    function ApplyCoupon()
    {
        $("#coupon_code").val("");
        alert("Invalid Coupon Applied");
        //$("#coupon_error").text("Invalid Coupon");
        // $.ajax({
        //     url: '/apply-coupon',
        //     method: 'POST',
        //     data: { coupon_code: code,"_token": "{{ csrf_token() }}" },
        //     success: function (response) {
        //         console.log(response);
        //         if(response.status==200){
                    
        //             $("#total_amount").text("CHF "+response.data.total);
        //             $("#total_discount").text("CHF "+response.data.discount);
        //         }
              
        //         // Update the UI with the discount and final total
        //     },
        //     error: function (xhr) {
        //         console.error(xhr.responseJSON.error);
        //     }
        // });
        
    }
</script>
@endsection