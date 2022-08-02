@extends('front.master')
@section('front')

<div class="my-account">
    <div class="container-fluid">
        <div class="row">
          @include('front.profile.sidebar')
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="dashboard-tab"  aria-labelledby="dashboard-nav">
                      
                         <h3><span class="text-danger">Hi.. </span> <strong>{{Auth()->user()->name}}</strong>   Welcome To e-shop  </h3>
                       
                    </div>
                   @include('front.profile.order.order')
                    <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                        <h4>Return Order</h4>
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Invoice No</th>
                                    <th>Date</th>
                                    <th>Price</th>
                                    <th>Return Reason</th>
                                    <th>Status</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($return_orders as $key => $order)
                                    
                                
                                <tr>
                                    <td>{{$key +=1}}</td>
                                    <td>{{$order->invoice_no}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>${{$order->amount}}</td>
                                    <td>${{$order->return_reason}}</td>

                                    <td > @if($order->return_order == 0) 
                                        <span class="badge badge-pill badge-warning" style="background: #418DB9;"> No Return Request </span>
                                        @elseif($order->return_order == 1)
                                        <span class="badge badge-pill badge-warning" style="background: #800000;"> Pendding </span>
                                        <span class="badge badge-pill badge-warning" style="background:red;">Return Requested </span>
                                       
                                        @elseif($order->return_order == 2)
                                         <span class="badge badge-pill badge-warning" style="background: #008000;">Success </span>
                                         @endif
                                    </td>
                
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                        <h4>Cancel Order</h4>
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Invoice No</th>
                                    <th>Date</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                     $cancel_orders  = App\Models\Order::where('user_id', Auth::id())->where('status', 'cancel')->orderBy('id', 'DESC')->get();
                                @endphp
                                @foreach ($cancel_orders as $key => $order)
                                    
                                
                                <tr>
                                    <td>{{$key +=1}}</td>
                                    <td>{{$order->invoice_no}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>${{$order->amount}}</td>
                                    <td ><span class="badge bg-info text-dark">{{$order->status}}</span> </td>
                
                                    <td><a href="{{ route('user-order-details',$order->id) }}" class="btn btn-info" title="Product Details"> <i class="fa fa-eye"></i> </a>
                                        <a target="_blank" href="{{ route('invoice-download',$order->id) }}" class="btn btn-danger" title="Inovice Download"> <i class="fa fa-download"></i> </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                
                    <div class="tab-pane fade" id="account-tab" role="tabpanel"      aria-labelledby="account-nav">
                        
                        <h4>Account Details</h4>
                        <div class="row">
                         
                            <div class="col-md-6">
                                <span>User Name:</span>
                                <input class="form-control" type="text" name="name"  value="{{Auth()->user()->name}}">
                                @error('name')
                                <div class="text-danger"><small>{{$message}}</small></div>
                            @enderror
                            </div>
                           
                           
                            <div class="col-md-6">
                                <span>User Email:</span>
                                <input class="form-control" type="text" name="email"  value="{{Auth()->user()->email}}" placeholder="Email">
                                @error('email')
                                <div class="text-danger"><small>{{$message}}</small></div>
                            @enderror
                            </div>
                          
                            <div class="col-md-12">
                                
                                <br><br>
                            </div>
                      
                        </div>
                        <form action="{{route('update-account-details',Auth()->user()->id )}}" method="POST">
                            @csrf
                        <h4>Password change</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <input class="form-control" type="password" name="oldPassword" placeholder="Current Password">
                                @error('oldPassword')
                                <div class="text-danger"><small>{{$message}}</small></div>
                            @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="password" type="text" placeholder="New Password">
                                @error('password')
                                <div class="text-danger"><small>{{$message}}</small></div>
                            @enderror
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="password_confirmation" placeholder="Confirm Password">
                                @error('password_confirmation')
                                <div class="text-danger"><small>{{$message}}</small></div>
                            @enderror
                            </div>
                            <div class="col-md-12">
                                <button class="btn">Save Changes</button>
                            </div>
                        </div>
                    </form>
                    </div>
              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection