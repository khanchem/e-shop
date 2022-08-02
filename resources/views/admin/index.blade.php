@extends('admin.admin_master')
@section('admin')

@php
	$date = date('d-m-y');
	$today = App\Models\Order::where('order_date',$date)->sum('amount');
	$month = date('F');
	$month = App\Models\Order::where('order_month',$month)->sum('amount');
   $year = date('Y');
	$year = App\Models\Order::where('order_year',$year)->sum('amount');
    $pending = App\Models\Order::where('status','pending')->count();
    $order= App\Models\Order::get();

     $daily_order = round(($pending/$month)*100, 2);
$vister = Auth::user()->count();
@endphp
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-10 bg-gradient-deepblue">
         <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-white">   {{count($order)}}</h5>
                <div class="ms-auto">
               
                    <i class='bx bx-cart fs-3 text-white'></i>
                </div>
            </div>
            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="d-flex align-items-center text-white">
                <p class="mb-0">Total Orders</p>
                <p class="mb-0 ms-auto">+{{$daily_order}}%<span><i class='bx bx-up-arrow-alt'></i></span></p>
            </div>
        </div>
      </div>
    </div>
    @php
        $rev_perc = round(($month/$year) *100, 2 );
    @endphp
    <div class="col">
        <div class="card radius-10 bg-gradient-orange">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-white">${{$month }}</h5>
                <div class="ms-auto">
                    <i class='bx bx-dollar fs-3 text-white'></i>
                </div>
            </div>
            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="d-flex align-items-center text-white">
                <p class="mb-0">Total Revenue</p>
                <p class="mb-0 ms-auto">+{{$rev_perc}}%<span><i class='bx bx-up-arrow-alt'></i></span></p>
            </div>
        </div>
      </div>
    </div>
   
    <div class="col">
        <div class="card radius-10 bg-gradient-ohhappiness">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-white">{{$vister}}</h5>
                <div class="ms-auto">
                    <i class='bx bx-group fs-3 text-white'></i>
                </div>
            </div>
            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="d-flex align-items-center text-white">
                <p class="mb-0">Visitors</p>
                <p class="mb-0 ms-auto">+5.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
            </div>
        </div>
    </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-gradient-ibiza">
         <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-white">5630</h5>
                <div class="ms-auto">
                    <i class='bx bx-envelope fs-3 text-white'></i>
                </div>
            </div>
            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="d-flex align-items-center text-white">
                <p class="mb-0">Messages</p>
                <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
            </div>
        </div>
     </div>
    </div>
</div><!--end row-->





 <div class="row">


    <div class="col-12 col-lg-6 col-xl-12 d-flex">
       <div class="card radius-10 w-100">
           <div class="card-header border-bottom bg-transparent">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0">Customer Review</h6>
                </div>
                <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                </div>
            </div>
        </div>
         <ul class="list-group list-group-flush">
            <li class="list-group-item bg-transparent">
              <div class="d-flex align-items-center">
               @php
                   $reviews = App\Models\Review::where('status', 1)->latest()->get();
               @endphp
               @foreach ($reviews  as $review)
                   
         
              <div class="ms-3">
                <h6 class="mb-0">{{$review->name}}<small class="ms-4"></small></h6>
                <p class="mb-0 small-font">{{$review->desc}}</p>
              </div>
              @endforeach
            </div>
            </li>
          
          </ul>
       </div>
    </div>
  </div><!--End Row-->


  <div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div>
                <h5 class="mb-0">Orders Summary</h5>
            </div>
            <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
            </div>
        </div>
        <hr>
        @php
        $orders =App\Models\Order::orderBy('id', 'DESC')->get();
    @endphp
    
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example2" class="table table-striped table-bordered">
                           
            <thead>
              <tr>
                                  
                        <th class="text-center " width="5%">S.No</th>
                <th width="15%" class="text-center ">Date</th>
                <th width="15%" class="text-center ">Invoice</th>
                <th class="text-center " width="15%">Amount</th>
                <th class="text-center " width="15%">Payment </th>
                <th class="text-center " width="10%">Status</th>
                <th class="text-center ">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $key => $item)
                <tr>
                                        <td class="text-center">{{$key +=1}}</td>
                <td class="text-center">{{ $item->order_date }}</td>
                <td>
                  {{ $item->invoice_no }}
                </td>
                <td class="text-center " style="color: rgb(8, 8, 8)">${{ $item->amount }}</td>
                <td class="text-center " style="color: rgb(8, 8, 8)"> {{ $item->payment_method }}</td>
                
                <td class="text-center " style="color: rgb(8, 8, 8)">
                  @if($item->status == 'Pending')
                  <span class="badge badge-pill badge-warning" style="background: #800080;"> Pending </span>
                  @elseif($item->status == 'confirm')
                   <span class="badge badge-pill badge-warning" style="background: #0000FF;"> Confirm </span>
          
                              </label>
                          </td>
                    @elseif($item->status == 'processing')
                   <span class="badge badge-pill badge-warning" style="background: #FFA500;"> Processing </span>
          
                    @elseif($item->status == 'picked')
                   <span class="badge badge-pill badge-warning" style="background: #808000;"> Picked </span>
          
                    @elseif($item->status == 'shiped')
                   <span class="badge badge-pill badge-warning" style="background: #808080;"> Shipped </span>
          
                    @elseif($item->status == 'delivered')
                   <span class="badge badge-pill badge-warning" style="background: #008000;"> Delivered </span>
          
                   @else
            <span class="badge badge-pill badge-warning" style="background: #FF0000;"> Confirm </span>
          
                @endif
                </td>
              
                <td>
                    
                                   <a href="{{route('order-detail-page',$item->id )}}" class="btn btn-success" title="Product Details" >
                <i class="lni lni-eye"></i></a>
                <a target="_blank" href="{{ route('invoice-download',$item->id) }}" class="btn btn-danger" title="Invoice Download"><i class="lni lni-download" ></i> </a>

              
                
                  </td>




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

@endsection