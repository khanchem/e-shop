@extends('front.master')
@section('front')

@section('title')
  checkout 
@endsection
 <!-- Checkout Start -->
        <div class="checkout">
            <div class="container-fluid">
                <form class="register-form" action="{{route('store-checkout')}}" method="POST">
                    @csrf
                <div class="row">
                    
                    <div class="col-lg-8">
                        <div class="checkout-inner">
                            <div class="billing-address">
                                <h2>Billing Address</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Full Name</label>
                                        <input class="form-control" type="text" name="shipping_name"  value="{{Auth()->user()->name}}">
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" name="shipping_email"  type="text" value="{{Auth()->user()->email}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                        <input class="form-control" name="shipping_phone" type="text" placeholder="Mobile No">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <input class="form-control" name="division_id" type="text" placeholder="Address">
                                    </div>
                                 
                                    <div class="col-md-6">
                                        <label>City</label>
                                        <input class="form-control"  name="district_id" type="text" placeholder="City">
                                    </div>
                                    <div class="col-md-6">
                                        <label>State</label>
                                        <input class="form-control" name="state_id"  type="text" placeholder="State">
                                    </div>
                                    <div class="col-md-6">
                                        <label>ZIP Code</label>
                                        <input class="form-control" name="post_code" type="text" placeholder="ZIP Code">
                                    </div>

                                </div>
                            </div>

                         
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-inner">
                            <div class="checkout-summary">
                                @foreach($carts as $cart)
                                <h1>Cart Total</h1>
                               
                                <p>{{$cart->name}}<span><img src="{{ asset('image/product/product_thambnail/'.$cart->options->image) }}" style="height: 50px; width: 50px;"></span>
                                </p>
                                <p>	<strong>Qty: </strong>
                                    ( {{ $cart->qty }} )
           
                                    <strong>Color: </strong>
                                    {{ $cart->options->color }}
           
                                    <strong>Size: </strong>
                                    {{ $cart->options->size }}<span>.</span></p>
                             
                                @endforeach 
                                @if(Session::has('coupon'))

                               <strong>SubTotal: </strong> ${{ $cartTotal }} <hr>

                          <strong>Coupon Name : </strong> {{ session()->get('coupon')['coupon_name'] }}
                                 ( {{ session()->get('coupon')['coupon_discount'] }} % )
                          <hr>
     
                             <strong>Coupon Discount : </strong> ${{ session()->get('coupon')['discount_amount'] }} 
                            <hr>

                          <strong>Grand Total : </strong> ${{ session()->get('coupon') ['total_amount'] }} 
                         <hr>


		 	               @else

                              <strong>SubTotal: </strong> ${{ $cartTotal }} <hr>

                        <strong>Grand Total : </strong> ${{ $cartTotal }} <hr>


		 	             @endif 

                            </div>

                            <div class="checkout-payment">
                                <div class="payment-methods">
                                    <h1>Payment Methods</h1>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-1" name="payment_method" value="cash" >
                                            <label class="custom-control-label" for="payment-1">Cash On Delivery</label>
                                        </div>
                                      
                                    </div>
                                 
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-3"  name="payment_method" value="stripe">
                                            <label class="custom-control-label" for="payment-3">Stripe</label>
                                        </div>
                                      
                                    </div>
                                 
                                   
                                </div>
                                <div class="checkout-btn">
                                    <button>Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- Checkout End -->

@endsection
