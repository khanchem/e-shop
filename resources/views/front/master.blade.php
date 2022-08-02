<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">
	<!--favicon-->
	<link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png ') }}" type="image/png" />
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('frontend/lib/slick/slick.css ') }} " rel="stylesheet">
        <link href="{{ asset('frontend/lib/slick/slick-theme.css ') }} " rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">  
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
     
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
                
        <link href="{{ asset('frontend/css/style.css ') }} " rel="stylesheet">
    </head>

    <body>
        <!-- Top bar Start -->
      
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
       @include('front.body.header.navbar')
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
        @include('front.body.header.search')    <!-- plus mini cart -->
        <!-- Bottom Bar End -->       
        
        <!-- Main Slider Start -->
        @yield('front')
        <!-- Review End -->        
        
        <!-- Footer Start -->
        @include('front.body.footer')
        <!-- Footer Bottom End -->       
   <!-- Sweet alert -->
<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
</script>
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js ') }}"></script>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src=" {{ asset('frontend/lib/easing/easing.min.js ') }} "></script>
        <script src=" {{ asset('frontend/lib/slick/slick.min.js ') }} "></script>
        
        <!-- Template Javascript -->
        <script src=" {{ asset('frontend/js/main.js') }} "></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
        
      	<!-- toster notification -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
   @if(Session::has('message'))
   var type = "{{ Session::get('alert-type','info') }}"
   switch(type){
      case 'info':
      toastr.info(" {{ Session::get('message') }} ");
      break;
  
      case 'success':
      toastr.success(" {{ Session::get('message') }} ");
      break;
  
      case 'warning':
      toastr.warning(" {{ Session::get('message') }} ");
      break;
  
      case 'error':
      toastr.error(" {{ Session::get('message') }} ");
      break; 
   }
   @endif 
  </script>
        
        
<!-- Add to Cart Product Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"    aria-hidden="true" >
    <div class="modal-dialog" >
      <div class="modal-content" style="width: 800px; right: 100px">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><span id="pname"> </span> </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <div class="modal-body" >
  
         <div class="row">
  
          <div class="col-md-4">
  
              <div class="card" style="width: 18rem;">
               <img src=" " class="card-img-top" alt="..." style="height: 200px; width: 250px;" id="pimage">
 
  </div>
  
          </div><!-- // end col md -->
  
  
          <div class="col-md-4">
  
       <ul class="list-group">
         <li class="list-group-item">Product Price: <strong class="text-danger">$<span id="pprice"></span></strong>
           <del id="oldprice">$</del>
              </li>
    <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
    <li class="list-group-item"> Category: <strong id="pcategory">  </strong></li>
    <li class="list-group-item"> Brand : <strong id="pbrand">  </strong></li> 
    <li class="list-group-item"> Stock : <strong id="aviable"  class="text-info" >  </strong>
   <span id="stockout" class="text-danger"></span></li> 
 
 
  </ul>
  
          </div><!-- // end col md -->
  
  
          <div class="col-md-4">
  
             <div class="form-group" id="colorArea">
            
                <label for="exampleFormControlSelect1">Choose Color</label>
                <select class="form-control" name="color" id="color">
                 
              
                </select>
              </div>
              <div class="form-group" id="sizeArea">
 
               
                <label for="exampleFormControlSelect1" >Choose Size</label>
                <select class="form-control" id="size" name="size" >
             
              
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Quantity</label>
                <input type="number" class="form-control" id="qty" value="1" min="1" >
              </div> <!-- // end form group -->
            <input type="hidden" id="product_id">
            <button type="submit" class="btn btn-primary mb-2" onclick="AddToCart()">Add to Cart</button>
              </div>  <!-- // end form group -->
           
              
             <div class="col-md-4">
             
             </div><!-- // end col md -->
 
             </div>
 
 
       </div>
  
         </div> <!-- // end row -->
  
  
  
  
  
  
  
  
  
  
        </div> <!-- // end modal Body -->
  
      </div>
    </div>
  </div>
  <!-- End Add to Cart Product Modal -->

<script type="text/javascript">
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            })
          // Start Product View with Modal 
          function productView(id){
            // alert(id)
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/'+id,
                dataType:'json',
                success:function(data){
                 // console.log(data)
                 $('#pname').text(data.product.product_name);
                 $('#price').text(data.product.selling_price);
                      $('#pcode').text(data.product.product_code);
                      $('#pcategory').text(data.product.category.category_name);
                      $('#pbrand').text(data.product.brand.brand_name);
                      $('#pimage').attr('src','/image/product/product_thambnail/'+data.product.product_thambnail); 
                      $('#product_id').val(id);
                      // Product Price 
                      if (data.product.discount_price == null) {
                        $('#pprice').text('');
                          $('#oldprice').text('');
                          $('#pprice').text(data.product.selling_price);
                      }else{
                          $('#pprice').text(data.product.discount_price);
                          $('#oldprice').text(data.product.selling_price);
                      } // end prodcut price 
          
                      // Start Stock opiton
                      if (data.product.product_qty > 0) {
                          $('#aviable').text('');
                          $('#stockout').text('');
                          $('#aviable').text('aviable');
                      }else{
                          $('#aviable').text('');
                          $('#stockout').text('');
                          $('#stockout').text('stockout');
                      } // end Stock Option 
                      //color
                $('select[name="color"]').empty();    
          $.each(data.color, function(key, value){
            $('select[name="color"]').append('<option value="'+value+'">'+value+'</option>')
            if(data.color== ""){
            $('#colorArea').hide();
          }else{
            $('#colorArea').show();
          }
          
          });
          //size
          $('select[name="size"]').empty();    
          $.each(data.size, function(key, value){
            $('select[name="size"]').append('<option value="'+value+'">'+value+'</option>')
          if(data.size== ""){
            $('#sizeArea').hide();
          }else{
            $('#sizeArea').show();
          }
          
          });
                }
          
          
            })
          
        }
           // end  Product model view

           // Start Add To Cart Product 
              function AddToCart(){
        var product_name = $('#pname').text();
        var id = $('#product_id').val();
        var color = $('#color option:selected').text();
        var size = $('#size option:selected').text();
        var quantity = $('#qty').val();
        $.ajax({
            type: "POST",
            dataType: 'json',
            data:{
                color:color, size:size, quantity:quantity, product_name:product_name
            },
            url: "/cart/data/store/"+id,
            success:function(data){

              
              $('#closeModel').click();
                console.log(data)
      //start message sweet alert
   const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }

  //end message sweet alert




            }
        })
    }
</script>
  <!-- Add to wishlist Product -->
<script type="text/javascript">
  function addToWishList(product_id){
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: "/add-to-wishlist/" + product_id,
        success:function(data){
             // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 
              }
      })
    }
</script>
  <!--  end Add to wishlist Product -->

<!-- /// Load Wishlist Data  -->


<script type="text/javascript">
  function wishlist(){
     $.ajax({
         type: 'GET',
         url: '/get-wishlist-product',
         dataType:'json',
         success:function(response){
             var rows = ""
             $.each(response, function(key,value){
                 rows += `  <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="/${'image/product/product_thambnail/'+value.product.product_thambnail} "  alt="Image"></a>
                                                    <p>${value.product.product_name}</p>
                                                </div>
                                            </td>
                                            <td>$ 
                                             
                        ${value.product.selling_price}
                         
                    
                         </td>
                                            <td>
                                                <div > $
                                                  ${value.product.discount_price}
                                                </div>
                                            </td>
                                            <td>   <button class="btn-cart" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)"> Add to Cart </button></td>
                                            <td><button type="submit" class="" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button></td>
                                        </tr>`
     });
             
             $('#wishlist').html(rows);
         }
     })
  }
wishlist();

//end product view
 ///  Wishlist remove Start 


    
  ///  Wishlist remove Start 
  function wishlistRemove(id){
        $.ajax({
            type: 'GET',
            url: '/wishlist-remove/'+id,
            dataType:'json',
            success:function(data){
            wishlist();
             // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        });
    }
 // End Wishlist remove  


</script> 
  <!--My Cart Product Page -->
  <script type="text/javascript">
    function cart(){
       $.ajax({
           type: 'GET',
           url: '/get-cart-product',
           dataType:'json',
           success:function(response){
   var rows = ""
   $.each(response.carts, function(key,value){
       rows += `  <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="/${'image/product/product_thambnail/' + value.options.image}" alt="Image"></a>
                                                    <p>${value.name}Product Name</p>
                                                </div>
                                            </td>
                                            <td>$ ${value.price}</td>
                                            <td>
                                                <div class="qty">
                                                  ${value.qty > 1
            ? `<a id="${value.rowId}" onclick="cartDecrement(this.id)"></button> `
            : ` `
            }
                                                    
                                                    <input type="number" value="${value.qty}" min="1" max="100">
                                                    <a type="submit" class="btn-plus" id="${value.rowId}" onclick="cartIncrement(this.id)"></a>
                                                </div>
                                            </td>
                                            <td>$   ${value.subtotal}</td>
                                            <td> <button type="submit" class="" id="${value.rowId}" onclick="myCartRemove(this.id)"><i class="fa fa-times"></i></button></td>
                                        </tr>`
       });
               
               $('#cartPage').html(rows);
           }
       })
    }
  cart();
  
  ///my cart remove
  function myCartRemove(rowId){
          $.ajax({
              type: 'GET',
              url: '/mycart-remove/'+rowId,
              dataType:'json',
              success:function(data){
                CouponField();
                $('#couponField').show();
               $('#coupon_name').val('');
                cart();
                couponCalculation();
                applyCoupon();
              wishlist();
               // Start Message 
                  const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        
                        showConfirmButton: false,
                        timer: 3000
                      })
                  if ($.isEmptyObject(data.error)) {
                      Toast.fire({
                          type: 'success',
                          icon: 'success',
                          title: data.success
                      })
                  }else{
                      Toast.fire({
                          type: 'error',
                          icon: 'error',
                          title: data.error
                      })
                  }
                  // End Message 
              }
          
               
          });
      }
  
  ///end my cart remove
  
  
   // -------- CART INCREMENT --------//
   function cartIncrement(rowId){
          $.ajax({
              type:'GET',
              url: "/cart-increment/"+rowId,
              dataType:'json',
              success:function(data){
                couponCalculation();
                applyCoupon();
                  cart();
                 
              }
          });
      }
   // ---------- END CART INCREMENT -----///
  
   
   // -------- CART Decrement  --------//
   function cartDecrement(rowId){
          $.ajax({
              type:'GET',
              url: "/cart-decrement/"+rowId,
              dataType:'json',
              success:function(data){
                couponCalculation();
                applyCoupon();
                  cart();
                
              }
          });
      }
   // ---------- END CART Decrement -----///
  </script> 
 <!-- end My Cart Product Page -->
 <!-------- coupon start ------->
 <script type="text/javascript">
  function applyCoupon(){
    var coupon_name = $('#coupon_name').val();
    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: {coupon_name:coupon_name},
        url: "{{ url('/coupon-apply') }}",
        success:function(data){

         const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 
        }
    });
  }
 
// always load method in end to display it  CouponField()
function couponCalculation(){
    $.ajax({
type: 'GET',
url: "{{url('/coupon-calculation')}}",
dataType: 'json',
success:function(data){
  if(data.total) {
    $('#CouponField').html(
    `	   <p>Sub Total<span>$${data.total}</span></p>
                                            
                                            <h2>Grand Total<span>$${data.total}</span></h2>
								`)
  }else{
    $('#CouponField').html(
    `
    <p>Sub Total<span>$${data.subtotal}</span></p>
    <p>Name<span>$${data.coupon_name} <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i>  </button></span></p> 
    <p>Discount<span>$${data.discount_amount}</span></p>
                                            
                                            <h2>Grand Total<span>$${data.total_amount}</span></h2>
							`)
  }
}
    });
  }
  couponCalculation(); // if you want to load subtotal add method in increament and decreamnt
</script>


<!--  //////////////// =========== End Coupon Remove================= ////  -->

<!--  //////////////// =========== Start Coupon Remove================= ////  -->

<script type="text/javascript">
     
     function couponRemove(){
        $.ajax({
            type:'GET',
            url: "{{ url('/coupon-remove') }}",
            dataType: 'json',
            success:function(data){
                couponCalculation();
                $('#couponField').show();
                $('#coupon_name').val('');
                 // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 
<!--  //////////////// =========== End Coupon Apply Start ================= ////  -->
            }
        });
     }
</script>


<!--  //////////////// =========== End Coupon Remove================= ////  -->

    </body>
</html>
