@extends('layouts.frontend')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('public/frontend/images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
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
                    <h3 class="mb-4 billing-heading">Contact Details</h3>
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">User Name</label>
                                <input type="text" class="form-control" name="chk_user_name" placeholder="" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">Phone Number</label>
                                <input type="text" class="form-control" name="chk_phone_no" placeholder="" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">Email</label>
                                <input type="text" class="form-control" name="chk_email" placeholder="" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">Password</label>
                                <input type="text" class="form-control" name="chk_password" placeholder="" value="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="streetaddress">Street</label>
                                <input type="text" class="form-control" name="chk_street" placeholder="" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="streetaddress">House Number</label>
                                <input type="text" class="form-control" name="chk_house_no" placeholder="" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="streetaddress">Post Code</label>
                                <input type="text" class="form-control" name="chk_post_code" placeholder="" value="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="streetaddress">Comments</label>
                                <textarea name="comments" id="" cols="30" rows="8" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Cart Total</h3>
                                <p class="d-flex">
                                    <span>Subtotal</span>
                                    <span>€ {{ number_format((float)Cart::getSubTotal(), 2, '.', '')}}</span>
                                </p>
                                <p class="d-flex">
                                    <span>Delivery</span>
                                    <span>€ 0.00</span>
                                </p>
                                <p class="d-flex">
                                    <span>Discount</span>
                                    <span>€ 0.00</span>
                                </p>
                                <hr>
                                <p class="d-flex total-price">
                                    <span>Total</span>
                                    <span>€ {{ number_format((float)Cart::getTotal(), 2, '.', '')}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cart-detail p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Payment Method</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" class="mr-2">Stripe</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="" class="mr-2">
                                                I have read and accept the terms and conditions</label>
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