@extends('front.master')
@section('front')

@section('title')
    My Cart
@endsection

<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-page-inner">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody  id="cartPage">
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            @if(Session::has('coupon'))
                           
				            @else
                            <div class="coupon">
                                <input type="text" id="coupon_name"  placeholder="Coupon Code">
                                <button type="submit" onclick="applyCoupon()">Apply Code</button>
                            </div>
                          
                            @endif
                        </div>
                        <div class="col-md-12">
                            <div class="cart-summary">
                                <h1>Cart Summary</h1>
                                <div class="cart-content" id="CouponField">
                                   
                                </div>
                                <div class="cart-btn">
                                  
                                    <a href="{{route('checout-page')}}" class="btn" type="submit">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart E

@endsection
