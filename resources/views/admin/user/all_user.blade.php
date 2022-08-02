@extends('admin.admin_master')
@section('admin')
@section('tittle')
All Users
@endsection


<h6 class="mb-0 text-uppercase">Total User : <span class="badge bg-info text-dark">{{count($users)}} </span> </h6>


				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
                               
								<thead>
									<tr>
                                      
                                        <th class="text-center " width="5%">S.No</th>
										<th width="15%" class="text-center ">Image</th>
										<th width="15%" class="text-center ">Name</th>
										<th class="text-center " width="15%">Email</th>
										
										<th class="text-center " width="10%">Status</th>
										<th class="text-center ">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($users as $key => $item)
										<tr>
                                            <td class="text-center">{{$key +=1}}</td>
										<td class="text-center">
                                            <img src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('/no_image.jpg') }}" alt="" height="80px", width="80px">
                                        </td>
										<td>
											{{ $item->name }}
										</td>
										<td class="text-center " style="color: rgb(8, 8, 8)">${{ $item->email }}</td>
                                     
										<td class="text-center " style="color: rgb(8, 8, 8)">
											@if($item->UserOnline())
											<span class="badge bg-info text-dark">Active Now</span>
										   @else
											   <span class="badge bg-danger text-dark">{{ Carbon\Carbon::parse($item->last_seen)->diffForHumans() }}</span>
										   @endif 
                                        
										</td>
									
										<td>
									      
                                            <a href=" " class="btn btn-info" title="Edit Data"><i class="bx bx-pencil"></i> </a>
                                            <a href=" " class="btn btn-danger" title="Delete Data" id="delete">
                                                <i class="bx bx-trash"></i></a>

									
									  
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