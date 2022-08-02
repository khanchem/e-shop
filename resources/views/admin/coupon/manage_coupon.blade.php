@extends('admin.admin_master')
@section('admin')

@section('tittle')
  Coupon Page
@endsection

<div class="card">
    <div class="card-body p-4">
        <h5 class="card-title">Add New Product</h5>
        <hr/>
         <div class="form-body mt-4">
         
             <div class="row">
           
             <div class="col-lg-8">
             <div class="border border-3 p-4 rounded">
                <table class="table mb-0">
                    <thead>
                        <tr>
                           
                            <th scope="col">S.No</th>
                            <th scope="col">Coupon Name</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Validate Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                     
          @foreach ($coupons as $key => $coupon)
                        <tr>
                            <td>
                              {{$key +=1}}
                            
                            </td>
                            <td>
                              
                            {{$coupon->coupon_name}}
                            </td>
                            <td>
                              
                                {{$coupon->coupon_discount}}%
                            </td>
                            <td>
                                {{ Carbon\Carbon::parse($coupon->coupon_validity)->format('D, d F Y') }}
                            
                            </td>
                            <td>
                                @if($coupon->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                <span class="badge bg-info text-dark">Valid</span>
                                @else
                                <span class="badge bg-danger text-dark"> Invalid </span>
                                @endif
                            </td>
                            <td>  <a href="{{route('delete-coupon', $coupon->id)}}" id="delete" class="btn btn-danger  " ><i class="bi bi-trash"></i>
                            </a></td>
                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
             </div>
             <div class="col-lg-4">
              <div class="border border-3 p-4 rounded">
                <form action="{{route('store-coupon')}}" method="POST">
                    @csrf
                <div class="row g-3">
                 
                      <div class="col-12">
                        <label for="inputProductTags" class="form-label">Coupon Name:</label>
                        <input type="text" class="form-control"id="inputProductTags" name="coupon_name" placeholder="Enter coupon name" >
                      </div>
              
                    <div class="col-12">
                      <label for="inputProductTags" class="form-label">Discount (%):</label>
                      <input type="text" class="form-control" id="inputProductTags" name="coupon_discount" placeholder="Enter coupon discount">
                    </div>
                 
                    <div class="col-12">
                        <label for="inputProductTags" class="form-label">Coupon Validity Date:</label>
                        <input type="date" class="form-control"  name="coupon_validity" >
                      </div>
                    <div class="col-12">
                        <div class="d-grid">
                          <input type="submit" class="btn btn-primary px-4" value="Add Coupon">
                        </div>
                    </div>
                </div> 
            </form>
            </div>
            </div>
            </div><!--end row-->
        
      </div>
    </div>
</div>




@endsection