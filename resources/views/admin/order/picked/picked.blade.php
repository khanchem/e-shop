@extends('admin.admin_master')
@section('admin')
@section('tittle')
Picked Order Page
@endsection


<h6 class="mb-0 text-uppercase">Picked Order List</h6>

				<hr/>
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
										
                                           <span class="badge bg-info text-dark"> {{$item->status}}</span> 
                                         
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

@endsection