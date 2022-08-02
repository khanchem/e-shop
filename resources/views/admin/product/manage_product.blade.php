@extends('admin.admin_master')
@section('admin')

@section('tittle')
 manage   product 
@endsection
<a href="{{route('add-new-product')}}" style="float: right; " class="mb-0 text-uppercase btn btn-info">Add Product</a>

<h6 class="mb-0 text-uppercase">All Products : <span class="badge bg-info text-dark">{{count($products)}} </span></h6>

				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
                               
								<thead>
									<tr>
                                        <th class="text-center " width="5%">S.No</th>
										<th width="15%" class="text-center ">Name</th>
										<th width="15%" class="text-center ">Image</th>
										<th class="text-center " width="15%">Selling Price</th>
										<th class="text-center " width="15%">Category</th>
										<th class="text-center " width="10%">Status</th>
										<th class="text-center ">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($products as $key => $product)
										<tr>
                                            <td class="text-center">{{$key +=1}}</td>
										<td class="text-center">{{$product->product_name}}</td>
										<td>
											<img class="center mt-2" id="imageShow"   src="{{!empty($product->product_thambnail)? url('image/product/product_thambnail/'.$product->product_thambnail) :url('/image/no_image.jpg')}}" width="80px" height="80px">

										</td>
										<td class="text-center " style="color: rgb(8, 8, 8)">{{$product->selling_price}}</td>
										<td class="text-center " style="color: rgb(8, 8, 8)">{{$product->category->category_name}}</td>
										<td class="text-center " style="color: rgb(8, 8, 8)">
											@if($product->status == 1)
											<span class="badge bg-info text-dark">Active</span>
                                           @else
                                           <span class="badge rounded-pill bg-danger">InActive</span>
                                           @endif
										</td>
									
										<td>
											<a href="{{route('edit-product',$product->id )}}" class="btn btn-primary" title="Product Details Data"><i class="fadeIn animated bi bi-eye"></i> </a>
									  <a href="{{route('edit-product',$product->id )}}" class="btn btn-info" title="Edit Data">	<i class="fadeIn animated bx bx-edit"></i>
									   </a>
									  <a href="{{route('delete-product',$product->id )}}" class="btn btn-danger" title="Delete Data" id="delete">
										<i class="fadeIn animated bx bx-trash-alt"></i></a>
									   @if($product->status == 1)
									   <a href="" class="btn btn-danger" title="Inactive Now"><i class="fadeIn animated bx bx-downvote"></i> </a>
										   @else
									   <a href="" class="btn btn-success" title="Active Now"><i class="fadeIn animated bx bx-upvote"></i> </a>
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