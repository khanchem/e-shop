<div class="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="{{route('dashboard')}}" class="nav-item nav-link active">Home</a>
                 <!--   <a href="{{route('all-product-view')}}" class="nav-item nav-link">Products</a> -->
                   
                    <a href="{{route('my-cart-view')}}" class="nav-item nav-link">Cart</a>
                    <a href="{{route('checout-page')}}" class="nav-item nav-link">Checkout</a>
                    <a href="{{route('whishlist-view')}}" class="nav-item nav-link">Wishlist</a>

                    
                </div>
                <div class="navbar-nav ml-auto">
                    @if (Route::has('login'))
                    
                        @auth
                            <a href="{{ route('my-account') }}" style="color: aliceblue">MY ACCOUNT</a>
                        @else
                            <a href="{{ route('login') }}" style="color: aliceblue" class="">LOGIN OR REGISTER</a>
    
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class=""></a>
                            @endif
                        @endauth
                 
                @endif
                  
                </div>
            </div>
        </nav>
    </div>
</div>