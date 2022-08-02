<div class="bottom-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    @php
    $logo = App\Models\SiteSetting::find(1);
    $wishlist =App\Models\Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();
    $cart =  Gloudemans\Shoppingcart\Facades\Cart::content();
@endphp
                    <a href="index.html"> 
                        <img src="{{ asset('image/logo/'.$logo->logo) }}" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <form method="POST" action="{{route('product-search')}}">
                    @csrf
                 <div class="search">
                    <input type="text"  class="search-field" id="search" name="search" placeholder="Search here..." />
                    <button class="search-button" type="submit"><i class="fa fa-search"></i></button>
                 </div>
                 
               
                </form>
            </div>
        
            <div class="col-md-3">
                <div class="user">
                    <a href="{{route('whishlist-view')}}" class="btn wishlist">
                       ({{count( $wishlist )}}) <i class="fa fa-heart"></i>
                      
                    </a>
                    <a href="{{route('my-cart-view')}}" class="btn cart">
                        ({{count( $cart )}})    <i class="fa fa-shopping-cart"></i>
                        
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>