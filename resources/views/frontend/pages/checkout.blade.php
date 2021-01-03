@extends('layouts.frontend')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">Checkout</h1>
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
                        <legend class="w-auto text-dark"><small>Customer Information</small></legend>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">User Name</label>
                                    <input type="text" class="form-control" name="chk_user_name" placeholder=""
                                        value="{{Auth::guard('frontend')->user()->name}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input type="text" class="form-control" name="chk_phone_no" placeholder=""
                                        value="{{Auth::guard('frontend')->user()->phone_no}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="chk_email" placeholder=""
                                        value="{{Auth::guard('frontend')->user()->email}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">Street</label>
                                    <input type="text" class="form-control" name="chk_street" placeholder=""
                                        value="{{Auth::guard('frontend')->user()->address}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">House Number</label>
                                    <input type="text" class="form-control" name="chk_house_no" placeholder=""
                                        value="{{Auth::guard('frontend')->user()->home_no}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">Post Code</label>
                                    <input type="text" class="form-control" name="chk_post_code" placeholder=""
                                        value="{{Auth::guard('frontend')->user()->zip_code}}" disabled>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="border p-4 mt-4">
                        <legend class="w-auto text-dark"><small>Delivery Information</small></legend>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">Delivery Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="dlv_date" id="dlv_date" placeholder=""
                                        value="{{date("Y-m-d")}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Delivery Time <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control" name="dlv_time" id="dlv_time" placeholder=""
                                        value="{{date("h:i",strtotime('+5 hours'))}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Delivery Address <small>(optional)</small></label>
                                    <input type="text" class="form-control" name="dlv_address" id="dlv_address"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Delivery Phone <small>(optional)</small></label>
                                    <input type="text" class="form-control" name="dlv_phone" id="dlv_phone"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="streetaddress">Order Notes <small>(optional)</small></label>
                                    <textarea name="comments" id="" cols="30" rows="8" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col-xl-5">
                    <div class="row mt-1 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Cart Total</h3>
                                <p class="d-flex">
                                    <span>Subtotal</span>
                                    <span>CHS {{ number_format((float)Cart::getSubTotal(), 2, '.', '')}}</span>
                                </p>
                                <p class="d-flex">
                                    <span>Delivery</span>
                                    <span>CHS 0.00</span>
                                </p>
                                <p class="d-flex">
                                    <span>Discount</span>
                                    <span>CHS 0.00</span>
                                </p>
                                <hr>
                                <p class="d-flex total-price">
                                    <span>Total</span>
                                    <span>CHS {{ number_format((float)Cart::getTotal(), 2, '.', '')}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cart-detail p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Payment Method</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="chk_payment_method" class="mr-2" value="0"
                                                    required>CASH ON DELIVERY</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="chk_payment_method" class="mr-2" value="1"
                                                    required>PAYMENT BY CARD</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="" class="mr-2" required>
                                                I have read and accept the <a href="#">terms & conditions.</a></label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary py-3 px-4">Place an Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</section> <!-- .section -->
@endsection