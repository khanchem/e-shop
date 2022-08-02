@extends('admin.admin_master')
@section('admin')

@section('tittle')
edit  product 
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<div class="card">
    <div class="card-body p-4">
        <h5 class="card-title">Add New Product</h5>
        <hr/>
         <div class="form-body mt-4">
          <form action="{{route('update-product-details',$products->id)}}" method="POST" >
            @csrf
             <div class="row">
           
             <div class="col-lg-8">
             <div class="border border-3 p-4 rounded">
              <div class="mb-3">
                  <label for="inputProductTitle" class="form-label">Product Title</label>
                  <input type="text" class="form-control" name="product_name" value="{{$products->product_name}}" >
                </div>
                 @error('product_name')
             <div class="text-danger">{{$message}}</div>
               @enderror
                <div class="mb-3">
                  <label for="inputProductDescription" class="form-label">Short Description</label>
                  <textarea class="form-control" name="short_desc" rows="3" >{{$products->short_desc}}</textarea>
                </div>
               
                <div class="mb-3">
                    <label for="inputProductDescription" class="form-label">Long Description</label>
                    <textarea id="mytextarea" name="long_desc">{{$products->long_desc}}</textarea>
                  </div>
                
                 
              
              </div>
             </div>
             <div class="col-lg-4">
              <div class="border border-3 p-4 rounded">
                <div class="row g-3">
                  <div class="col-md-6">
                      <label for="inputPrice" class="form-label">Selling Price</label>
                      <input type="text" class="form-control" value="{{$products->selling_price}}" name="selling_price" >
                    </div>
                    <div class="col-md-6">
                        <label for="inputCostPerPrice" class="form-label">Discount Price</label>
                        <input type="text" class="form-control" name="discount_price" value="{{$products->product_qty}}"  >
                      </div>
                    <div class="col-md-6">
                      <label for="inputCostPerPrice" class="form-label">Quantity</label>
                      <input type="text" class="form-control" name="product_qty" value="{{$products->product_qty}}"  >
                    </div>
                    
                    <div class="col-md-6">
                      <label for="inputStarPoints" class="form-label">Product Code</label>
                      <input type="text" class="form-control" value="{{$products->product_code}}"  name="product_code" >
                    </div>
                    <div class="col-12">
                        @php
                            $brands = App\Models\Brand::get();
                        @endphp
                        <label for="inputProductType" class="form-label">Product Category</label>
                        <select class="form-select" id="inputProductType" name="brand_id" >
                           @foreach ($brands as $brand)
                               
                        
  
                            <option value="{{$brand->id}}" {{ $brand->id == $products->brand_id ? 'selected': '' }} >{{$brand->brand_name}}</option>
                            @endforeach
                          </select>
                      </div>
                    <div class="col-12">
                      @php
                          $categories = App\Models\Category::get();
                      @endphp
                      <label for="inputProductType" class="form-label">Product Category</label>
                      <select class="form-select" id="inputProductType" name="category_id" >
                         @foreach ($categories as $category)
                             
                      

                          <option value="{{$category->id}}" {{ $category->id == $products->category_id ? 'selected': '' }} >{{$category->category_name}}</option>
                          @endforeach
                        </select>
                    </div>
              
                    <div class="col-12">
                      <label for="inputProductTags" class="form-label">Product Tags</label>
                      <input type="text" class="form-control"  id="inputProductTags" name="product_tag" placeholder="Enter Product Tags" value="{{$products->product_tag}}" >
                    </div>
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" {{ $products->latest == 1 ? 'checked': '' }} name="latest" id="flexCheckDefault">
                            <label class="form-check-label"  for="flexCheckDefault">Latest Product</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" {{ $products->feature == 1 ? 'checked': '' }} name="feature" id="flexCheckDefault">
                            <label class="form-check-label"  for="flexCheckDefault">Feature Product</label>
                          </div>
                         
                         
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                          <input type="submit" class="btn btn-primary px-4" value="Update Product">
                        </div>
                    </div>
                </div> 
            </div>
            </div>
            </div><!--end row-->
         </form>

         <hr class="color: black">
         <hr class="color: black">
         <h4 class="box-title"><strong>Product Thumbnail Images</strong></h4>
       <form method="POST" action="" enctype="multipart/form-data">
          @csrf
         <div class="mb-3">
          <input type="hidden" name="id" value="{{ $products->id }}">
          <input type="hidden" name="old_img" value="{{ $products->product_thambnail }}">
          <label class="form-label">Thumbnail Image:</label>
          <input type="file"  id="product_thambnail" class="form-control" name="product_thambnail" required>

          <center>  <img class="center mt-2" id="imageShow"   src="{{!empty($products->product_thambnail)? url('image/product/product_thambnail/'.$products->product_thambnail) :url('/image/no_image.jpg')}}" width="100px" height="120px"> </center>
        </div>
        <button class="btn btn-success mb-4 ml-4">Update Thambnail Image</button>
       </form>

        <hr class="color: black">
        <hr class="color: black">

       
       
       
       
       
       
        <section class="content">
            <div class="row">
       
        <div class="col-md-12">
                       <div class="box bt-3 border-info">
                         <div class="box-header">
                <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                         </div>
       
       
               <form method="POST" action="{{route('update-multi-image')}}" enctype="multipart/form-data">
       @csrf
                   <div class="row row-sm">
                       @foreach($multi_images as $img)
                       <div class="col-md-3">
       
        <div class="card">
         <img src="{{asset('/product/multi_image/product_multi_image/'.$img->multi_image)}}"  class="card-img-top" style="height: 130px; width: 230px;" >
       
         
         <div class="card-body">
           <h5 class="card-title">
       <a href="{{route('delete-multi-image', $img->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="bx bx-trash"></i> </a>
            </h5>
           <p class="card-text"> 
               <div class="form-group">
                   <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                   <input class="form-control" type="file" name="multi_img[ {{$img->id}} ]">
               </div> 
           </p>
       
         </div>
       </div> 		
       
                       </div><!--  end col md 3		 -->	
                       @endforeach
       
                   </div>			
       
                   <div class="text-xs-right">
       <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                </div>
       <br><br>
       
       
       
               </form>		   
       
       
       
       
       
                       </div>
                     </div>
       
       
       
            </div> <!-- // end row  -->
       
    </section>
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
<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>


@endsection