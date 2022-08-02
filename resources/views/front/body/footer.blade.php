

@php
    $footer = App\Models\SiteSetting::find(1);
@endphp
<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h2>Get in Touch</h2>
                    <div class="contact-info">
                        <p><i class="fa fa-map-marker"></i>{{$footer->company_address}}</p>
                        <p><i class="fa fa-envelope"></i>{{$footer->email}}</p>
                        <p><i class="fa fa-phone"></i>{{$footer->phone_one}}</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h2>Follow Us</h2>
                    <div class="contact-info">
                        <div class="social">
                            <a href="{{$footer->twitter}}"><i class="fab fa-twitter"></i></a>
                            <a href="{{$footer->facebook}}"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{$footer->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                           
                            <a href="{{$footer->youtube}}"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h2>Company Info</h2>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Condition</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h2>Purchase Info</h2>
                    <ul>
                        <li><a href="#">Pyament Policy</a></li>
                        <li><a href="#">Shipping Policy</a></li>
                        <li><a href="#">Return Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="row payment align-items-center">
            <div class="col-md-6">
                <div class="payment-method">
                    <h2>We Accept:</h2>
                    <img src="{{ asset('frontend/img/payment-method.png ') }}" alt="Payment Method" />
                </div>
            </div> 
            <div class="col-md-6">
                <div class="payment-security">
                    <h2>Secured By:</h2>
                    <img src="{{ asset('frontend/img/godaddy.svg ') }}" alt="Payment Security" />
                    <img src="{{ asset('frontend/img/norton.svg ') }}" alt="Payment Security" />
                    <img src="{{ asset('frontend/img/ssl.svg ') }}" alt="Payment Security" />
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

