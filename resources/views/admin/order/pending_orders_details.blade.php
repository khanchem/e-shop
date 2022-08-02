@extends('admin.admin_master')
@section('admin')
@section('tittle')
Pending Order Detail Page
@endsection
	<!--start page wrapper -->
  
        
            <div class="container">
                <div class="main-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                 
                                        <div class="mt-3">
                                            <h4>Shipping Details</h4>
                                          
                                        
                                            
                                            
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                         <h6>Shipping Name :</h6>   {{$order->name}}
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6>Shipping  Email :</h6>     {{$order->email}}
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                         <h6>Shipping  Phone No: </h6>   {{$order->phone}}
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                          <h6 class="text-center">Address :</h6> 
                                          State:   {{$order->state_id}}   , Division: {{$order->division_id}}, District : {{$order->district_id}}, Postal Code : {{$order->post_code}}
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6>Order Date:  </h6>   {{$order->order_date}}
                                        </li>
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                 
                                        <div class="mt-3">
                                            <h4>Order Details</h4>
                                          
                                        
                                            
                                            
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                         <h6> Name :</h6>   {{$order->name}}
                                        
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                         <h6> Phone No: </h6>   {{$order->phone}}
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                          <h6 class="text-center">Payment Type :</h6> 
                                          {{$order->payment_method}}
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6>Tranx ID:  </h6>   {{$order->transaction_id}}
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6>Invoice:  </h6>  <span class="text-danger">{{$order->invoice_no}}</span>  
                                            </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6>Order Total:  </h6>   {{$order->amount}}
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                <h6>Order:  </h6> <p class="badge rounded-pill bg-info">{{$order->status}}</p>  
                                                </li>
                                                @if($order->status == 'Pending')
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                  <a href="{{ route('pending-confirm',$order->id) }}" id="confirm" class="btn btn-success">Confirm Order </a> 
                                                    </li>
                                                  
                              @elseif($order->status == 'confirmed')
                              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <a href="{{route('confirm-to-processing',$order->id)}}" id="processing" class="btn btn-success">Processing Order </a> 
                                  </li>
                                  @elseif($order->status == 'processing')
                                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <a href="{{route('processing-to-picked',$order->id)}}" id="picked" class="btn btn-success">Picked Order </a> 
                                      </li>
                                      @elseif($order->status == 'picked')
                                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <a href="{{route('picked-to-shiped',$order->id)}}" id="shiped" class="btn btn-success">Ship Order </a> 
                                          </li>
                                          @elseif($order->status == 'shiped')
                                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <a href="{{route('picked-to-delivered',$order->id)}}" id="deliver" class="btn btn-success">Deliver Order </a> 
                                              </li>
                                              @elseif($order->status == 'delivered')
                                              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                <a href="{{route('cancel-delivered-order',$order->id)}}" id="cancel" class="btn btn-danger">Cancel Order </a> 
                                                  </li>
                                                    @endif
                                              
                                    </ul>
                                </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="example2" class="table table-striped table-bordered">
                               
                                            <thead>
                                                <tr>
                                                    <th class="text-center " width="2%">S.No</th>
                                                    <th width="25%" class="text-center ">Name</th>
                                                    <th width="15%" class="text-center ">Image</th>
                                                    <th class="text-center " width="15%">Product Code</th>
                                                    <th class="text-center " width="15%">Color</th>
                                                    <th class="text-center " width="15%">Size</th>
                                                    <th class="text-center " >Quantity</th>
                                                    <th class="text-center" width="10%">Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ( $orderItem as $key => $item)
                                                   <tr>
                                                    <td>{{$key +=1}}</td>
                                                    
                                                 <td class="text-center "> 
                                                    {{$item->product->product_name}}
                                                 </td>
                                                
                                                   <td> <img class="center mt-2" src="{{ asset('/image/product/product_thambnail/'.$item->product->product_thambnail) }}" width="100px" height="80px">
                                                   </td>
                                               <td class="text-center "> {{$item->product->product_code}}</td>
                                               <td class="text-center "> {{$item->color}}</td>
                                               <td class="text-center "> {{$item->size}}</td>
                                               <td class="text-center "> {{$item->qty}}</td>
                                               <td class="text-center ">    <label for="">
                                                 ${{ $item->price }}  ( $ {{ $item->price * $item->qty}} ) </label></td>
                                              </tr>
                                                
                                                @endforeach
                                                
                                            
                                            </tbody>
                                            
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  
    <!--end page wrapper -->

@endsection
