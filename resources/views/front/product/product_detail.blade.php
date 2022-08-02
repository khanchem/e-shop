@extends('front.master')
@section('front')

@section('title')
    Product Detail Page
@endsection

  <!-- Product Detail Start -->
  <div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="product-detail-top">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="product-slider-single normal-slider">
                               
                                @foreach ($product_multiImage as $item)
                                <div class="slider-nav-img"><img src="{{'/product/multi_image/product_multi_image/'. $item->multi_image}}" alt="Product Image"></div>
                                @endforeach
                            </div>
                            <div class="product-slider-single-nav normal-slider">
                            
                                @foreach ($product_multiImage as $item)
                                <div class="slider-nav-img"><img src="{{'/product/multi_image/product_multi_image/'. $item->multi_image}}" alt="Product Image"></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-content">
                                <div class="title"  id="pname"><h2>{{$products->product_name}}</h2></div>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price">
                                    <h4>Price:</h4>
                                    @if($products->discount_price == null)
                                    <p>${{$products->selling_price}}</p>
                                    @else
                                    <p>${{$products->discount_price}} <span>${{$products->selling_price}}</span></p>
                                    @endif
                                </div>
                                <div class="quantity">
                                    <h4>Quantity:</h4>
                                    <div class="qty">
                                        <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                        <input type="number" value="1" id="qty" min="1">
                                        <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="p-size">
                                    <h4>Size:</h4>
                                    <div class="btn-group btn-group-sm">
                                        @if($products->product_size == null)
                                    @else
                                

                            
                                        <select class=""  name="size" id="size"  >
                                        <option selected="" disabled="">--Choose Size--</option>
                                        @foreach($product_size as $size)
                                        <option value="{{ $size }}">{{ ucwords($size)  }}</option>
                                        @endforeach
                                        </select> 
                                  
                                    @endif
                                    </div> 
                                </div>
                                <input type="hidden" id="product_id" value="{{$products->id}}">
                                <div class="p-color">
                                    <h4>Color:</h4>
                                    <div class="btn-group btn-group-sm">
                                        @if($products->product_color == null)
                                        @else
                                    
    
                                            <select class=""  name="color" id="color"  >
                                            <option selected="" disabled="">--Choose Color--</option>
                                            @foreach($product_color as $color)
                                            <option value="{{ $color }}">{{ ucwords($color)  }}</option>
                                            @endforeach
                                            </select> 
                                      
                                        @endif
                                    </div> 
                                </div>
                                <div class="action">
                                    <button class="btn" type="submit"  onclick="AddToCart()"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                                    <a class="btn" href="#"><i class="fa fa-shopping-bag"></i>Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row product-detail-bottom">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#specification"></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (1)</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="description" class="container tab-pane active">
                                <h4>Product description</h4>
                                <p>
                                    {!!$products->long_desc!!}
                                </p>
                            </div>
                            <div id="specification" class="container tab-pane fade">
                              
                            </div>
                            <div id="reviews" class="container tab-pane fade">
                                @php
                                    $review = App\Models\Review::latest()->limit(2)->get();
                                @endphp
                                @foreach ($review as $item)
                                    
                             
                                <div class="reviews-submitted">
                                    @if($item->status == 1)
                                    <div class="reviewer">{{$item->name}} </div>
                                   
                                    <p>
                                        {{$item->desc}}
                                    </p>
                                    @elseif($item->status == 0)
                                   <div class="text-danger"><strong> No Review </strong></div>
                                    @endif
                                </div>
                                @endforeach
                              @guest
                              <strong><b>For product review Login First <a  href="{{route('login')}}">Login Here</a></b></strong>
                              @else
                                    <div class="reviews-submit">
                                    <h4>Give your Review:</h4>
                                    <div class="row form">
                                        <form action="{{route('review-store')}}" method="POST">
                                            @csrf
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Name" name="name" >
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="email" placeholder="Email" name="email">
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea placeholder="Review" name="desc"></textarea>
                                        </div>
                                        <div class="col-sm-12">
                                            <button>Submit</button>
                                        </div>
                                      </form>
                                    </div>
                                   
                              
                          
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="product">
                    <div class="section-header">
                        <h1>Related Products</h1>
                    </div>

                    <div class="row align-items-center product-slider product-slider-3">
                        @foreach ( $related_products as $item)
                       
                        <div class="col-lg-3">
                            
                               
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="{{route('product-detail',$item->id)}}">{{$item->product_name}}</a>
                                  
                                </div>
                                <div class="product-image">
                                    <a href="{{route('product-detail',$item->id)}}">
                                        <img src="{{asset('image/product/product_thambnail/'.  $item->product_thambnail)}}" data-echo="{{asset('image/product/product_thambnail/'.$item->product_thambnail)}}" width="150px" alt="Product Image">
                                    </a>
                                    <div class="product-action">
                                        <a href="#"><i class="fa fa-cart-plus"></i></a>
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-price">
                                    @if($item->discount_price == null)
                                    <h3><span>$</span>{{$item->selling_price}}</h3>
                                    @else
                                    <h3><span>$</span>{{$item->discount_price}}</h3>
                                    @endif
                                   
                                </div>
                            </div>
                           
                    
                        </div>
                       
                        @endforeach
                        
                    </div>
                </div>
            </div>
            
            @php
            $categories = App\Models\Category::orderBy('id', 'DESC')->limit(6)->get();
                   @endphp
            
            <!-- Side Bar Start -->
            <div class="col-lg-4 sidebar">
                <div class="sidebar-widget category">
                    <h2 class="title">Category</h2>
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            @foreach ($categories as $item)
                                
                        
                            <li class="nav-item">

                                <a class="nav-link" href="{{url('search/category/'.$item->id)}}"><i class="{{$item->category_icon}}"></i>{{$item->category_name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                       @php
                        $features = App\Models\Product::where('feature',1)->orderBy('id','DESC')->limit(4)->get();
                      @endphp
                <div class="sidebar-widget widget-slider">
                    <div class="sidebar-slider normal-slider">
                        @foreach ($features as $feature)
                        <div class="product-item">
                            <div class="product-title">
                                <a href="{{route('product-detail',$feature->id)}}">{{$feature->product_name}}</a>
                           
                            </div>
                            <div class="product-image">
                                <a href="{{route('product-detail',$feature->id)}}">
                                    <img src="{{asset('image/product/product_thambnail/'.$feature->product_thambnail)}}" id="pimage" alt="Product Image" height="250px" width="100px">
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
                                
                                <span class="price"> ${{ $feature->discount_price }} </span>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                            @endif
                        </div>
                      @endforeach
                    </div>
                </div>
                @php
                    $brand = App\Models\Brand::orderBy('id', 'DESC')->limit(6)->get();
                @endphp
                <div class="sidebar-widget brands">
                    <h2 class="title">Our Brands</h2>
                    <ul>
                        @foreach ( $brand as $item)
    

                        <li><a href="{{ url('product/brand/'.$item->id) }}">{{$item->brand_name}} </a></li>
                        @endforeach
                    </ul>
                </div>
                @php
                    $product_tags = App\Models\Product::groupBy('product_tag')->select('product_tag')->get()
                @endphp
                <div class="sidebar-widget tag">
                    <h2 class="title">Tags Cloud</h2>
                    
                        @foreach ($product_tags as $item)
                            
                      
                  
                    <a href="{{url('tag/wise/product/'. $item->product_tag)}}">{{ str_replace(',', ' ', $item->product_tag) }}</a>
                    @endforeach
                </div>
            </div>
            <!-- Side Bar End -->
        </div>
    </div>
</div>
<!-- Product List End --> 
            <!-- Side Bar End -->
        </div>
    </div>
</div>
<!-- Product Detail End -->

@include('front.body.brand')
@endsection