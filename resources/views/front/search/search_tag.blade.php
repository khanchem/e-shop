@extends('front.master')
@section('front')

@section('title')
 Search By Tag
@endsection
@php
     $categories = App\Models\Category::orderBy('id', 'DESC')->limit(6)->get();
@endphp

<!-- Product List Start -->
<div class="product-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                  
                    @foreach ($products as $feature)
                            
                  
                    <div class="col-md-4">
                        @if($feature->id == null)
                        no product Found 
                        @else
                        <div class="product-item">
                            <div class="product-title">
                                <a href="{{route('product-detail',$feature->id)}}">{{$feature->product_name}}</a>
                           
                            </div>
                            <div class="product-image">
                                <a href="{{route('product-detail',$feature->id)}}">
                                    <img src="{{asset('image/product/product_thambnail/'.$feature->product_thambnail)}}" data-echo="{{asset('image/product/product_thambnail/'.$feature->product_thambnail)}}" alt="Product Image" height="250px" width="100px">
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
                        @endif
                    </div>
                    @endforeach
                </div>
                
                <!-- Pagination Start -->
                <div class="col-md-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- Pagination Start -->
            </div>           
            
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
                                <a href="#">{{$feature->product_name}}</a>
                           
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
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
                            
                      
                  
                    <a href="{{url('tag/wise/product/'. $item->id)}}">{{ str_replace(',', ' ', $item->product_tag) }}</a>
                    @endforeach
            </div>
            <!-- Side Bar End -->
        </div>
    </div>
</div>
<!-- Product List End --> 

@endsection