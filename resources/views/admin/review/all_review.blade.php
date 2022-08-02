@extends('admin.admin_master')
@section('admin')

@section('tittle')
Manage  Review 
@endsection
<a href="{{route('add-new-product')}}" style="float: right; " class="mb-0 text-uppercase btn btn-info">Add Product</a>

<h6 class="mb-0 text-uppercase">All Products : <span class="badge bg-info text-dark">{{count($reviews)}} </span></h6>

				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
                               
								<thead>
									<tr>
                                        <th class="text-center " width="5%">S.No</th>
										<th width="15%" class="text-center ">Name</th>
										<th width="15%" class="text-center ">Email</th>
										<th class="text-center " width="15%">Review Desc</th>
										<th class="text-center " width="10%">Status</th>
										<th >Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($reviews as $key => $product)
										<tr>
                                            <td class="text-center">{{$key +=1}}</td>
										<td class="text-center">{{$product->name}}</td>
										<td>
											{{$product->email}}
										</td>
										<td class="text-center " style="color: rgb(8, 8, 8)">{{$product->desc}}</td>
							
										<td class="text-center " style="color: rgb(8, 8, 8)">
											@if($product->status == 1)
											<span class="badge bg-info text-dark">approved</span>
                                           @else
                                           <span class="badge rounded-pill bg-danger">pendding</span>
                                           @endif
										</td>
									
										<td>
											
									
									  <a href="{{route('delete-review',$product->id )}}" class="btn btn-danger" title="Delete Data" id="delete">
										<i class="fadeIn animated bx bx-trash-alt"></i></a>
									@if($product->status== 1)

                                    @else
									   <a href="{{route('approve-review',$product->id )}}" class="btn btn-info" > Approve</a>
										@endif 
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