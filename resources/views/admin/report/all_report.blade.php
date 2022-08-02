@extends('admin.admin_master')
@section('admin')
@section('tittle')
  <h1>All Reprts</h1> 
@endsection
<div class="container">


<div class="row">
  

   
    <div class="col-xl-4 mx-auto">
        
            <h6 class="mb-0 text-uppercase">Search By Date</h6>
            <hr/>
            <form   method="POST" action="{{route('report-by-date')}}">
                @csrf
            <div class="card">
                
            
                <div class="card-body">
                    <h6 class="
                     mb-3">
                
                    </h6>

                        

                       
                 <span>Select Date:</span>
                    <input class="form-control mb-3" type="date" aria-label="default input example" name="brand_name" required>
             
                
                   
               
                  <button class="btn btn-success">Search</button>
               
             </div>
            
          
            
         </div>
       </form>
    </div> <!--end -->

    <div class="col-xl-4 mx-auto">
        
        <h6 class="mb-0 text-uppercase">Search By Date</h6>
        <hr/>
        <form   method="POST" action="{{route('search-by-month')}}">
            @csrf
        <div class="card">
            
        
             <div class="card-body">
    
	 <div class="form-group">
		<h5>Select Month  <span class="text-danger">*</span></h5>
		<div class="controls">

		<select name="month" class="form-control">
			<option label="Choose One"></option>
			<option value="January">January</option>
			<option value="February">February</option>
			<option value="March">March</option>
			<option value="April">April</option>
			<option value="May">May</option>
			<option value="Jun">Jun</option>
			<option value="July">July</option>
			<option value="August">August</option>
			<option value="September">September</option>
			<option value="October">October</option>
			<option value="November">November</option>
			<option value="December">December</option>


		</select> 

	 @error('month') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div> 


 <div class="form-group">
		<h5>Select Year  <span class="text-danger">*</span></h5>
		<div class="controls">

		<select name="year_name" class="form-control">
			<option label="Choose One"></option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
			<option value="2025">2025</option>
			<option value="2026">2026</option> 
		</select> 

	 @error('year_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>  

			 <div class="text-xs-right mt-3">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">					 
						</div>
             </div>
        
      
        
        </div>
      </form>
    </div> <!--end -->

    
     <div class="col-xl-4 mx-auto">
                <h6 class="mb-0 text-uppercase">Brand</h6>
                <hr/>
                <form action="{{route('search-by-year')}}"  method="POST" >
                    @csrf
                <div class="card">
                    
                
                    <div class="card-body">
                        <div class="form-group">
                            <h5>Select Year  <span class="text-danger">*</span></h5>
                            <div class="controls">
                    
                            <select name="year" class="form-control">
                                <option label="Choose One"></option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option> 
                            </select> 
                    
                         @error('year') 
                         <span class="text-danger">{{ $message }}</span>
                         @enderror 
                        </div>
                        </div>   
                    
                                 <div class="text-xs-right mt-3">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">					 
                                            </div>
                </div>
                
             </div>
        </form>

    

</div>
</div>
@endsection