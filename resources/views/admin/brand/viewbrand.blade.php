@extends('admin.admin_master')
@section('admin')
@section('tittle')
  <h1>Brand </h1> 
@endsection
<div class="container">


<div class="row">
  

   
    <div class="col-xl-8 mx-auto">
        <h6 class="mb-0 text-uppercase">BRand Table</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <table class="table mb-0">
                    <thead>
                        <tr>
                           
                            <th scope="col">S.No</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">BRand Image</th>
                            <th scope="col">Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                     
                        @foreach ($brands as $key => $brand)
                        
                     
                        <tr>
                            <td>{{$key +=1}}</td>
                            <td>{{$brand->brand_name}}</td>
                            <td>
                                <img src="{{asset('backend_images/brand_image/'.$brand->brand_image)}}" alt="" width="200px" height="100px">
                            
                            </td>
                            <td>  <a href="{{route('delete-brand',$brand->id )}}" id="delete" class="btn btn-danger  " ><i class="bi bi-trash"></i>
                            </a></td>
                        
                        </tr>
                        @endforeach  
                    </tbody>
                </table>
            </div>
        </div>
    
    </div>
            <div class="col-xl-4 mx-auto">
                <h6 class="mb-0 text-uppercase">Brand</h6>
                <hr/>
                <form  action="{{route('store-brand')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    
                
                    <div class="card-body">
                        <h6 class="
                         mb-3">
                       Add Brand
                        </h6>

                            

                           
                     <span>Brand Name:</span>
                        <input class="form-control mb-3" type="text" aria-label="default input example" name="brand_name" required>
                 
                        <span>Brand Image:</span>
                        <input class="form-control mb-3" type="file" id="brandimage" name="brand_image" required>
                        <center><img src="" id="imageShow" alt=""></center>
                       
                   
                      <button class="btn btn-success">Add Brand</button>
                   
                    </div>
                
            </div>
        </form>

    

</div>
</div>
<script>
    $(document).ready(function () {
     $('#brandimage').change(function(e){
    let reader = new FileReader();
    reader.onload= (e) =>{
        $('#imageShow').attr('src', e.target.result).width(80).height(80);
    }
        
         reader.readAsDataURL(this.files[0]); 
 
     });
     
});
 </script>
@endsection