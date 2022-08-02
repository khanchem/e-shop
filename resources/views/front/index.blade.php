@extends('front.master')
@section('front')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@section('title')
    E - Shop
@endsection
@php
            $categories = App\Models\Category::orderBy('id','DESC')->limit(8)->get();
            $homeSlider = App\Models\Slider::get();
            $thubnail = App\Models\Slider::orderBy('id','DESC')->limit(2)->get();
        @endphp
         
<div class="header">
    <div class="container-fluid">

        
        <div class="row">
            <div class="col-md-3">
                <nav class="navbar bg-light">
                    <ul class="navbar-nav">
                        @foreach ($categories as $category)
                            
                      
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('search/category/'.$category->id)}}"><i class="{{$category->category_icon}}"></i>{{$category->category_name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
          
            <div class="col-md-7">
                <div class="header-slider normal-slider">
                    @foreach ($homeSlider as $Slider )
                        
                   
                    <div class="header-slider-item">
                        <img src="{{asset('backend_images/slider_image/'.$Slider->slider_image)}}" alt="Slider Image" width="900px"  height="400px"/>
                        <div class="header-slider-caption">
                            <p>{{$Slider->slider_desc}}</p>
                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Shop Now</a>
                        </div>
                    </div>
                   
                    @endforeach
                    </div>
                </div>
            </div>
        
        
        </div>
    </div>
</div>
<!-- Main Slider End -->      
@include('front.body.brand')
<!-- Brand End -->      

<!-- Feature Start-->
<div class="feature">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fab fa-cc-mastercard"></i>
                    <h2>Secure Payment</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur elit
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-truck"></i>
                    <h2>Worldwide Delivery</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur elit
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-sync-alt"></i>
                    <h2>90 Days Return</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur elit
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 feature-col">
                <div class="feature-content">
                    <i class="fa fa-comments"></i>
                    <h2>24/7 Support</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur elit
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End-->      
@php
    $thubnails = App\Models\Product::where('status',1)->orderBy('id','DESC')->limit(4)->get();
@endphp
<!-- Category Start-->
<div class="category">
    <div class="container-fluid">
        <div class="row">
            @foreach ($thubnails as $item)
                
         
            <div class="col-md-3">
                <div class="category-item ch-400">
                    <img src="{{asset('/image/product/product_thambnail/'.$item->product_thambnail)}}" />
                    <a class="category-name" href="{{route('product-detail',$item->id)}}">
                        <p>{{$item->short_desc}}</p>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Category End-->       

<!-- Call to Action Start -->
<div class="call-to-action">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>call us for any queries</h1>
            </div>
            @php
            $numbur = App\Models\SiteSetting::find(1);
        @endphp
            <div class="col-md-6">
                <a href="tel:{{$numbur->phone_two}}">{{$numbur->phone_two}}</a>
            </div>
        </div>
    </div>
</div>
<!-- Call to Action End -->       
@php
       $featured = App\Models\Product::where('feature',1)->orderBy('id','DESC')->limit(9)->get();
@endphp
<!-- Featured Product Start -->
<div class="featured-product product">
    <div class="container-fluid">
        <div class="section-header">
            <h1>Featured Product</h1>
        </div>
        <div class="row align-items-center product-slider product-slider-4">
            @foreach ($featured as $feature)
            <div class="col-lg-3">
              
                    
               
                <div class="product-item">
                    <div class="product-title">
                        <a href="{{route('product-detail',$feature->id)}}">{{$feature->product_name}}</a>
                   
                    </div>
                    <div class="product-image">
                        <a href="{{route('product-detail',$feature->id)}}">
                            <img src="{{asset('image/product/product_thambnail/'.$feature->product_thambnail)}}" alt="Product Image" height="250px" width="100px">
                        </a>
                        <div class="product-action">
                            <button class="btn btn-primary icon"  type="button" data-toggle="modal" data-target="#exampleModal" id="{{$feature->id}}" 
                                 onclick="productView(this.id)"> <i class="fa fa-shopping-cart" ></i> </button>
                                 <button class="btn btn-primary icon"  type="button"  onclick="addToWishList(this.id)" id="{{$feature->id}}"><i class="fa fa-heart"></i></button>
                            <a href="#"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    @if($feature->discount_price == null)

                    <div class="product-price">
                        <h3><span>$</span>{{$feature->selling_price}}</h3>
                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                    </div>
                    @else 
                    <div class="product-price">
                        
                        <h3>${{ $feature->discount_price }}</h3>
     
                    </div>
                    @endif
                </div>
                
            </div>
            @endforeach
           
        </div>
    </div>
</div>
<!-- Featured Product End -->       

<!-- Newsletter Start -->
<div class="newsletter">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1>Email us for any queries</h1>
            </div>
      
                <div class="col-md-6">
                    <h1 style="float: right">{{$numbur->email}}</h1>
                </div>
            
        </div>
    </div>
</div>
<!-- Newsletter End -->        
@php
       $latested = App\Models\Product::where('latest',1)->orderBy('id','DESC')->limit(9)->get();
@endphp
<!-- Recent Product Start -->
<div class="recent-product product">
    <div class="container-fluid">
        <div class="section-header">
            <h1>Recent Product</h1>
        </div>
        <div class="row align-items-center product-slider product-slider-4">
            @foreach ($latested as $latest)
                
            
            <div class="col-lg-3">
                <div class="product-item">
                    <div class="product-title">
                        <a href="{{route('product-detail',$latest->id)}}">{{$latest->product_name}}</a>
                       
                    </div>
                    <div class="product-image">
                        <a href="{{route('product-detail',$latest->id)}}">
                            <img src="{{asset('image/product/product_thambnail/'.$latest->product_thambnail)}}" alt="Product Image" height="250px" width="100px">
                        </a>
                        <div class="product-action">
                            <button class="btn btn-primary icon"  type="button" data-toggle="modal" data-target="#exampleModal" id="{{$latest->id}}"  onclick="productView(this.id)"> <i class="fa fa-shopping-cart" ></i> </button>
                            <button class="btn btn-primary icon"  type="button"  onclick="addToWishList(this.id)" id="{{$latest->id}}"><i class="fa fa-heart"></i></button>
                            <a href="#"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    @if($latest->discount_price == null)

                    <div class="product-price">
                        <h3>${{$latest->selling_price}}</h3>
                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                    </div>
                    @else 
                    <div class="product-price">
                        <h3>${{ $latest->discount_price }}</h3>
                       
                       
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Recent Product End -->

@endsection