
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>DANA SCHOOL || </title>
  
  @include('layouts.backend.includes.header-links')
  
</head>

<body>

<!-- Start wrapper-->
 <div id="wrapper">
 
 @include('layouts.backend.includes.sidebar')

 @include('layouts.backend.includes.navbar')



<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

      @yield('content')
	  
       <!--End Dashboard Content-->

	   <!--start overlay-->
	  <div class="overlay toggle-menu"></div>
	<!--end overlay-->
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	@include('layouts.backend.includes.footer')
	
   
  </div><!--End wrapper-->

  @include('layouts.backend.includes.scripts')
  
</body>

</html>
