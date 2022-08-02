@extends('front.master')
@section('front')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
Stripe Payment Page 
@endsection

<script src="https://js.stripe.com/v3/"></script>


 <!-- Checkout Start -->
 <div class="checkout">
    <div class="container-fluid">
        
        <div class="row">
            
            <div class="col-lg-8">
                <div class="checkout-inner">
                    <div class="billing-address">
                        <h2>Billing Address</h2>
                        <div class="row">
                            <ul >


                                <hr>
                                         <li>
                                             @if(Session::has('coupon'))
                                
                                <strong>SubTotal: </strong> ${{ $cartTotal }} <hr>
                                
                                <strong>Coupon Name : </strong> {{ session()->get('coupon')['coupon_name'] }}
                                ( {{ session()->get('coupon')['coupon_discount'] }} % )
                                 <hr>
                                
                                 <strong>Coupon Discount : </strong> ${{ session()->get('coupon')['discount_amount'] }} 
                                 <hr>
                                
                                  <strong>Grand Total : </strong> ${{ session()->get('coupon')['total_amount'] }} 
                                 <hr>
                                
                                
                                             @else
                                
                                <strong>SubTotal: </strong> ${{ $cartTotal }} <hr>
                                
                                <strong>Grand Total : </strong> ${{ $cartTotal }} <hr>
                                
                                
                                             @endif 
                                
                                         </li>
                                
                                
                                
                                                </ul>	

                        </div>
                    </div>

                 
                </div>
            </div>
            <div class="col-lg-4">
                <div class="checkout-inner">
                   

                    <div class="checkout-payment">
                       

                        <form action="{{route('cash-order')}} " method="post" id="payment-form">
                            @csrf
                   
                            <label for="card-element">
                         <strong>Payment Methode </strong>  
                         <hr> 
                            </label>
                                    
      <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
      <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
      <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
      <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
      <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
      <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
      <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                             
                          <img src="{{asset('frontend/img/cash.png')}}" alt="">
                       
                        <br>
                        <button class="btn btn-primary">Submit Payment</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- Checkout End -->

<script type="text/javascript">
    // Create a Stripe client.
var stripe = Stripe('pk_test_51LMm8sDCJrKTTtfrfKaQQV3Nq90MVRxBHMlFcU5bwVuu6yCnJjCYTLxNrFnmoe20iXBvty6b9J1oEjhUep6p2iVE008gCugOft');
// Create an instance of Elements.
var elements = stripe.elements();
// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};
// Create an instance of the card Element.
var card = elements.create('card', {style: style});
// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});
// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});
// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
  // Submit the form
  form.submit();
}
</script>


@endsection
