@extends('admin.admin_master')
@section('admin')

@section('tittle')
    product Form
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<div class="card">
    <div class="card-body p-4">
        <h5 class="card-title">Add New Product</h5>
        <hr/>
         <div class="form-body mt-4">
          <form action="{{route('store-product')}}" method="POST" enctype="multipart/form-data">
            @csrf
             <div class="row">
           
             <div class="col-lg-8">
             <div class="border border-3 p-4 rounded">
              <div class="mb-3">
                  <label for="inputProductTitle" class="form-label">Product Title</label>
                  <input type="text" class="form-control" name="product_name" id="inputProductTitle" placeholder="Enter product title" required>
                </div>
                 @error('product_name')
             <div class="text-danger">{{$message}}</div>
               @enderror
                <div class="mb-3">
                  <label for="inputProductDescription" class="form-label">Short  Description</label>
                  <textarea class="form-control" name="short_desc" id="inputProductDescription" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="inputProductDescription" class="form-label">Long Description</label>
                    <textarea id="mytextarea" name="long_desc">Hello, World!</textarea>
                  </div>
                
               
                <div class="mb-3">
                    <label class="form-label">Thumbnail Image:</label>
                    <input type="file"  id="product_thambnail" class="form-control" name="product_thambnail" required>

                    <center>  <img class="center mt-2" id="imageShow" > </center>
                  </div>
                 
                <div class="mb-3">
                  <label class="form-label">Product Multi  Images:</label>
                  <input type="file"  id="multiImg" class="form-control" name="multi_image[]" required  multiple>
                  <div class="row mt-3" id="preview_img"></div>
                </div>
              </div>
             </div>
             <div class="col-lg-4">
              <div class="border border-3 p-4 rounded">
                <div class="row g-3">
                  <div class="col-md-6">
                      <label for="inputPrice" class="form-label">Selling Price</label>
                      <input type="text" class="form-control" name="selling_price" required id="inputPrice" placeholder="00.00">
                    </div>
                  
                    <div class="col-md-6">
                      <label for="inputCostPerPrice" class="form-label">Discount Price</label>
                      <input type="text" class="form-control" name="discount_price" required id="inputCostPerPrice" placeholder="00.00">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCostPerPrice" class="form-label">Quantity</label>
                        <input type="text" class="form-control" name="product_qty" required id="inputCostPerPrice" placeholder="00.00">
                      </div>
                    <div class="col-md-6">
                      <label for="inputStarPoints" class="form-label">Product Code</label>
                      <input type="text" class="form-control" required name="product_code" id="inputStarPoints" placeholder="00.00">
                    </div>
                    <div class="col-12">
                        @php
                            $brands = App\Models\Brand::get();
                        @endphp
                        <label for="inputProductType" class="form-label">Product brand</label>
                        <select class="form-select" id="inputProductType" name="brand_id" required>
                           @foreach ($brands as $brand)
                               
                        
  
                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                            @endforeach
                          </select>
                      </div>
                    <div class="col-12">
                      @php
                          $categories= App\Models\Category::get();
                      @endphp
                      <label for="inputProductType" class="form-label">Product Category</label>
                      <select class="form-select" id="inputProductType" name="category_id" required>
                         @foreach ($categories as $category)
                             
                      

                          <option value="{{$category->id}}">{{$category->category_name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="inputProductTags" class="form-label">Product Color</label>
                        <input type="tag" class="form-control"  id="inputProductTags" name="product_color" value="white, black, red">
                      </div>
                      <div class="col-12">
                        <label for="inputProductTags" class="form-label">Product Size</label>
                        <input type="tag" class="form-control"id="inputProductTags" name="product_size" value="small, medium, large">
                      </div>
              
                    <div class="col-12">
                      <label for="inputProductTags" class="form-label">Product Tags</label>
                      <input type="tag" class="form-control" id="inputProductTags" name="product_tag" placeholder="Enter Product Tags">
                    </div>
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="latest" id="flexCheckDefault">
                            <label class="form-check-label"  for="flexCheckDefault">Latest Product</label>
                          </div>
                         
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="feature" id="flexCheckDefault">
                            <label class="form-check-label"  for="flexCheckDefault">Feature Product</label>
                          </div>
                        
                          </div>
                        </div>
                      </div>
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