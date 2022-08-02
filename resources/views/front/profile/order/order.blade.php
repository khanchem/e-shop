<div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
    <div class="table-responsive">
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
                    $orders =App\Models\Order::where('user_id', Auth::id())->where('return_reason', '=', NULL)->where('status', '!=', 'cancel')->orderBy('id', 'DESC')->get();
                @endphp
                @foreach ($orders as $key => $order)
                    
                
                <tr>
                    <td>{{$key +=1}}</td>
                    <td>{{$order->invoice_no}}</td>
                    <td>{{$order->order_date}}</td>
                    <td>${{$order->amount}}</td>

                    <td >
                        @if($order->status == 'Pending')
                        <span class="badge badge-pill badge-warning" style="background: #800080;"> Pending </span>
                        @elseif($order->status == 'confirm')
                         <span class="badge badge-pill badge-warning" style="background: #0000FF;"> Confirm </span>
                
                                    </label>
                                </td>
                          @elseif($order->status == 'processing')
                         <span class="badge badge-pill badge-warning" style="background: #FFA500;"> Processing </span>
                
                          @elseif($order->status == 'picked')
                         <span class="badge badge-pill badge-warning" style="background: #808000;"> Picked </span>
                
                          @elseif($order->status == 'shiped')
                         <span class="badge badge-pill badge-warning" style="background: #808080;"> Shipped </span>
                
                          @elseif($order->status == 'delivered')
                         <span class="badge badge-pill badge-warning" style="background: #008000;"> Delivered </span>
                
                         @else
                  <span class="badge badge-pill badge-warning" style="background: #FF0000;"> Confirm </span>
                
                      @endif
</td>
                    <td><a href="{{ route('user-order-details',$order->id) }}" class="btn btn-info" title="Product Details"> <i class="fa fa-eye"></i> </a>
                        <a target="_blank" href="{{ route('invoice-download',$order->id) }}" class="btn btn-danger" title="Inovice Download"> <i class="fa fa-download"></i> </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>