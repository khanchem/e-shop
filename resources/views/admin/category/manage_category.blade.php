@extends('admin.admin_master')
@section('admin')
@section('tittle')
    Category
@endsection
<div class="container">


<div class="row">
  

   
    <div class="col-xl-8 mx-auto">
        <h6 class="mb-0 text-uppercase">Category Table</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <table class="table mb-0">
                    <thead>
                        <tr>
                           
                            <th scope="col">S.No</th>
                            <th scope="col">Category Icon</th>
                            <th scope="col">Category Name</th>
                           
                            <th scope="col">Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                     
                        @foreach ($categories as $key => $category)
                        
                     
                        <tr>
                            <td>{{$key +=1}}</td>
                            <td>
                              
                                    <h1>
                                    <i class="  {{$category->category_icon}}"></i>
                                </h1>
                              
                               
                            </td>
                            <td>{{$category->category_name}}</td>
                          
                            <td>  <a href="{{route('delete-category',$category->id )}}" id="delete" class="btn btn-danger  " ><i class="bi bi-trash"></i>
                            </a></td>
                        
                        </tr>
                        @endforeach  
                    </tbody>
                </table>
            </div>
        </div>
    
    </div>
            <div class="col-xl-4 mx-auto">
                <h6 class="mb-0 text-uppercase">Category</h6>
                <hr/>
                <form action="{{route('add-category')}}"  method="POST" >
                    @csrf
                <div class="card">
                    
                
                    <div class="card-body">
                        <h6 class="
                         mb-3">
                       Add Category
                        </h6>

                            

                           
                     <span>Category Name:</span>
                        <input class="form-control mb-3" type="text" aria-label="default input example" name="category_name" required>
                 
                        <span>Category Icon:</span>
                        <input class="form-control mb-3" type="text" id="brandimage" name="category_icon" required>
                        <center><i id="imageShow"  class="" ></i></center>
                       
                   
                      <button class="btn btn-success">Add Category</button>
                   
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