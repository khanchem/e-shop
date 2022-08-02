@extends('admin.admin_master')
@section('admin')

@section('tittle')
    product Form
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<div class="card">
    <div class="card-body p-4">
        <h5 class="card-title">Site Setting Update</h5>
        <hr/>
         <div class="form-body mt-4">
          <form action="{{route('site-update-setting')}}" method="POST" enctype="multipart/form-data">
            @csrf
             <div class="row">
              <input type="hidden" name="id" value="{{ $setting->id }}">
             <div class="col-lg-8">
             <div class="border border-3 p-4 rounded">
              <div class="mb-3">
                  <label for="inputProductTitle" class="form-label">Company Name :</label>
                  <input type="text" class="form-control" name="company_name" value="{{$setting->company_name}}" placeholder="Enter product title" >
                </div>
            
                <div class="mb-3">
                    <label class="form-label">Company Logo:</label>
                    <input type="file"  id="product_thambnail" class="form-control" name="logo" value="{{$setting->logo}}" >
<center>
                    <img class="center mt-2" id="imageShow"   src="{{!empty($setting->logo)? url('/image/logo/'.$setting->logo) :url('/image/no_image.jpg')}}" width="100px" height="100px"> </center>
                  </div>
                     
                <div class="mb-3">
                  <label class="form-label">Company Email:</label>
                  <input type="email"   class="form-control" name="email" value="{{$setting->email}}">
                
                </div>
                <div class="mb-3">
                  <label class="form-label">Company Address:</label>
                  <input type="text"   class="form-control" name="company_address" value="{{$setting->company_address}}">
                </div>
                <div class="mb-3">
                  <label class="form-label">Company Phone 1:</label>
                  <input type="text"  id="multiImg" class="form-control"  name="phone_one"  value="{{$setting->phone_one}}">
                  
                </div>
               
                <div class="mb-3">
                  <label class="form-label">Company Phone 2:</label>
                  <input type="text"  id="multiImg" class="form-control" name="phone_two" value="{{$setting->phone_two}}">
                  
                </div>
              </div>
             </div>
             <div class="col-lg-4">
              <div class="border border-3 p-4 rounded">
                <div class="row g-4">
                 
                  
                   
                    <div class="col-12">
                        <label for="inputProductTags" class="form-label">Facebook :</label>
                        <input type="text" class="form-control"  name="facebook" placeholder="Paste Link Here" value="{{$setting->facebook}}" >
                      </div>
                      <div class="col-12">
                        <label for="inputProductTags" class="form-label">Twitter :</label>
                        <input type="tag" class="form-control" name="twitter" value="{{$setting->twitter}}">
                      </div>

                    <div class="col-12">
                      <label for="inputProductTags" class="form-label">Linkend :</label>
                      <input type="text" class="form-control" id="inputProductTags" name="linkedin" value="{{$setting->linkedin}}">
                    </div>
             
                    <div class="col-12">
                      <label for="inputProductTags" class="form-label">YouTube :</label>
                      <input type="text" class="form-control"  name="youtube" value="{{$setting->youtube}}">
                    </div>
             
                    <div class="col-12">
                        <div class="d-grid">
                          <input type="submit" class="btn btn-primary px-4" value="Add Product">
                        </div>
                    </div>
                </div> 
            </div>
            </div>
            </div><!--end row-->
         </form>
      </div>
    </div>
</div>
<script>
  $(document).ready(function () {
   $('#product_thambnail').change(function(e){
  let reader = new FileReader();
  reader.onload= (e) =>{
      $('#imageShow').attr('src', e.target.result).width(80).height(80);
  }
      
       reader.readAsDataURL(this.files[0]); 

   });
   
});
</script>















@endsection