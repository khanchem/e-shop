@php
    $brands = App\Models\Brand::orderBy('id','DESC')->get();
@endphp
<!-- Brand Start -->
<div class="brand">
    <div class="container-fluid">
        <div class="brand-slider">
            @foreach ($brands as $brand)
                
          
            <div class="brand-item"><img src="{{asset('/backend_images/brand_image/'.$brand->brand_image)}}" alt=""></div>
            @endforeach
        </div>
    </div>
</div>