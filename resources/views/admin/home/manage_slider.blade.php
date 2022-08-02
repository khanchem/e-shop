@extends('admin.admin_master')
@section('admin')
@section('tittle')
    Slider
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
                            <th scope="col">Slider Short Desc</th>
                            <th scope="col">Slider Image</th>
                            <th scope="col">Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                     
                        @foreach ($sliders as $key => $slider)
                        
                     
                        <tr>
                            <td>{{$key +=1}}</td>
                            <td>{{$slider->slider_desc}}</td>
                            <td>
                                <img src="{{asset('backend_images/slider_image/'.$slider->slider_image)}}" alt="" width="200px" height="100px">
                            
                            </td>
                            <td>  <a href="{{route('delete-slider',$slider->id )}}" id="delete" class="btn btn-danger  " ><i class="bi bi-trash"></i>
                            </a></td>
                        
                        </tr>
                        @endforeach  
                    </tbody>
                </table>
            </div>
        </div>
    
    </div>
            <div class="col-xl-4 mx-auto">
                <h6 class="mb-0 text-uppercase">Slider</h6>
                <hr/>
                <form  action="{{route('store-slider')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    
                
                    <div class="card-body">
                        <h6 class="
                         mb-3">
                       Add Slider
                        </h6>

                            

                           
                     <span>Slider Short Desc:</span>
                     <textarea name="slider_desc" id="" cols="38" rows="3"></textarea>
                    
                 
                        <span>Slider Image:</span>
                        <input class="form-control mb-3" type="file" id="brandimage" name="slider_image" required>
                        <center><img src="" id="imageShow" alt=""></center>
                       
                   
                      <button class="btn btn-success">Add Slider</button>
                   
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