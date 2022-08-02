<!doctype html>
<html lang="en">

<head> 
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png ') }}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css ') }}" rel="stylesheet"/>
	<link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css ') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css ') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css ') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('backend/assets/css/pace.min.css ') }}" rel="stylesheet" />
	<script src="{{ asset('backend/assets/js/pace.min.js ') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('backend/assets/css/bootstrap.min.css ') }}" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/app.css ') }}" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/icons.css ') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/dark-theme.css ') }}" />
	<link rel="stylesheet" href="{{ asset('backend/assets/css/semi-dark.css ') }}" />
	<link rel="stylesheet" href="{{ asset('backend/assets/css/header-colors.css ') }}" />

	

	

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">  

<link href="{{ asset('backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css ') }}" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
	<title>@yield('title')</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('admin.body.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
		@include('admin.body.header')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

					@yield('admin')
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js ') }}"></script>
	<!--plugins-->
	<script src="{{ asset('backend/assets/js/jquery.min.js ') }}"></script>
	<script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js ') }}"></script>
	<script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js ') }}"></script>
	<script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js ') }}"></script>
	<script src="{{ asset('backend/assets/plugins/chartjs/js/Chart.min.js ') }}"></script>
	<script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js ') }}"></script>
    <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js ') }}"></script>
	<script src="{{ asset('backend/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js ') }}"></script>
	<script src="{{ asset('backend/assets/plugins/sparkline-charts/jquery.sparkline.min.js ') }}"></script>
	<script src="{{ asset('backend/assets/plugins/jquery-knob/excanvas.js ') }}"></script>
	<script src="{{ asset('backend/assets/plugins/jquery-knob/jquery.knob.js ') }}"></script>
	  <script>
		  $(function() {
			  $(".knob").knob();
		  });
	  </script>
	  <script src="{{ asset('backend/assets/js/index.js ') }}"></script>
	<!--app JS-->
	<script src="{{ asset('backend/assets/js/app.js ') }}"></script>


<!-- Sweet alert -->
<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
</script>
<script>
	tinymce.init({
	  selector: '#mytextarea'
	});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

 <script src="{{ asset('backend/assets/js/code.js') }}"></script>

 <script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js ') }}"></script>
 <script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js ') }}"></script>
 <script>
	 $(document).ready(function() {
		 $('#example').DataTable();
	   } );
 </script>
 <script>
	 $(document).ready(function() {
		 var table = $('#example2').DataTable( {
			 lengthChange: false,
			 buttons: [ 'copy', 'excel', 'pdf', 'print']
		 } );
	  
		 table.buttons().container()
			 .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
	 } );
 </script>



<script src="{{ asset('backend/assets/js/code.js ') }}"></script>
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
</body>

</html>