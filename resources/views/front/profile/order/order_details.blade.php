@extends('front.master')
@section('front')
@section('title')
Order Details Page
@endsection
<div class="my-account">
    <div class="container-fluid">
        <div class="row">
         
            <div class="col-md-6">
             
                 
                         
               
<!--  Product Details -->
<div class="tab-content">
    <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
        <h4>Product  Details</h4>
        <hr>
        
                   
        @php
        $total = $item->qty*$item->price;
    @endphp
    
       <ul>
           <li  class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
         <strong>Product Image :  </strong> <img src="{{url('/image/product/product_thambnail/'.$item->product->product_thambnail)}}" alt="" width="60px" height="100px">
           </li>
           <hr>
           <li  class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <strong>Product Name :  </strong>      {{$item->Product->product_name}}
                           </li>
                           <hr>
                           @if($item->size == null)
                           @else

             <li  class="list-group-item d-flex  ">
             <strong>Size:  </strong>      <p class="ml-5">{{$item->size}} </p>
                           </li>
                              <hr>
                              @endif
                              @if($item->color == null)
                           @else
         <li  class="list-group-item djustify-content-betwalign-items-center flex-wrap"> 
          <strong>Color :  </strong>     {{$item->color}}   
        </li>
          <hr>
          @endif
          <li  class="list-group-item ">
           
       
           
            <strong>Price :  </strong>  <span style="float: right">{{$item->price}}</span>   
          </li>
            <hr>
      
                                                

 <li  class="list-group-item ">
    <strong>Qty :</strong>      <span style="float: right">{{$item->qty}}</span>   
                                                                  </li>
                     <hr>
                     <li  class="list-group-item   ">
                        <strong>Total :</strong>       <span class="ml-5" style="float: right">{{$total}}</span>    
                                                                                      </li>
                                         <hr>
       </ul>
     
    </div>

  
 
   

</div>
<!-- End Product Details -->
            </div>


            <div class="col-md-6">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                        <h4>Shipping Details</h4>
                        <hr>
                       <ul>
                           <li  class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                         <strong>Shipping Name :  </strong> {{$order->name}}
                           </li>
                           <hr>
                           <li  class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <strong>Shipping Email :  </strong>      {{$order->email}}
                                           </li>
                                           <hr>
                             <li  class="list-group-item  ">
                             <strong>Shipping Phone :  </strong>      <p style="float: right">{{$order->phone}} </p>
                                           </li>
                                              <hr>
                         <li  class="list-group-item djustify-content-betwalign-items-center flex-wrap">
                            <h6 class="text-center">
                            <strong>Shipping Address  </strong> </h6> 
                           <hr>
                          <strong>State:  </strong>     {{$order->state_id}}   ,
                          

                          
                           <strong>Division:  </strong>  {{$order->division_id}},
                         
                            <strong>District :  </strong> {{$order->district_id}},
                            
                             <strong>Postal Code :  </strong> {{$order->post_code}}
                                      </li>
                                                                
<hr>
                 <li  class="list-group-item   ">
                    <strong>Order Date :</strong>      <p style="float: right"> {{$order->order_date}} </p>
                                                                                  </li>
                                     <hr>
                       </ul>
                    </div>
               
                  
                 
                   
              
                </div>
            </div>
        </div>
    </div>




<!-- order details  -->
  
<div class="col-md-12 mt-4 mb-4">
             
    <div class="tab-content">
      
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <h4><strong> Order  Details <span class="text-danger" >{{$order->invoice_no}} </span> </strong> </h4>
                        <tr>
                            <th> Order Name</th>
                            <th> Phone No</th>
                           
                            <th>Payment Method </th>
                           
                            <th>Transiction Id</th>
                            <th> Invoice No</th>
                            <th>Order Total </th>
                            <th>Status</th>
                          
                           
                        </tr>
                    </thead>
                    <tbody>
                     
                            
                        
                        <tr>
                            <td>{{$order->name}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->payment_method}}</td>
                            <td>{{$order->transaction_id}}</td>
                            <td class="text-danger">{{$order->invoice_no}} </td>
                            <td>{{$order->amount}}</td>
                            <td > <span class="badge bg-info text-dark">{{$order->status}}</span> </td>
                       
                           
        
                         
                        </tr>
                      
                    </tbody>
                </table>
            </div>
      
    
</div>
@php 
$order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
$order_null = App\Models\Order::where('id',$order->id)->where('return_reason','!=',NULL)->first();
@endphp
@if($order)
<div class="col-md-12 mt-4 mb-4">
             
    <div class="tab-content">
        <h4> <strong class="mb-2">Order Return Reason </strong>  </h4>
        <form action="{{route('return-delivered-order', $order->id)}}" method="POST">
            @csrf
       <textarea name="return_reason" id="" cols="90" rows="5"></textarea>
       <button class="btn btn-danger btn-cener">
        Return Product  </button> 
    </form>
    </div>
</div>

@elseif($order == 'pending'  )
@elseif($order ==   'confirmed'  )
@elseif($order ==   'processing')
@elseif($order ==    'cancel' )
@elseif($order_null)

<div class="col-md-12 mt-4 mb-4">
             
    <div class="tab-content">
        <div class="text-danger">Your Return Order is submitted Successfully wait for response. Thank you!</div>
    </div>
</div>

@else

@endif
@endsection 