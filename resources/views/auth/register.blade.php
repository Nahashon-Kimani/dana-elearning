<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Mirrored from codervent.com/rocker/demo/authentication-signup2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Mar 2021 09:24:09 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>REGISTER || DANA SCHOOL</title>
  <!--favicon-->
  <link rel="icon" href="{{ asset('backend/assets/images/favicon.ico') }}" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{ asset('backend/assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="{{ asset('backend/assets/css/app-style.css') }}" rel="stylesheet"/>
  
</head>

<body>
 <!-- Start wrapper-->
 <div id="wrapper">
 <div class="height-100v d-flex align-items-center justify-content-center">
	   <div class="card-authentication2 mx-auto my-3">
	    <div class="card-group">
	    	<div class="card mb-0">
	    	   <div class="bg-signup2"></div>
	    		<div class="card-img-overlay rounded-left my-5">
                 <h2 class="text-white">DANA</h2>
                 <h1 class="text-white">SCHOOL</h1>
                 <p class="card-text text-white pt-3">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
             </div>
	    	</div>

	    	<div class="card mb-0">
	    		<div class="card-body">
	    			<div class="card-content p-3">
	    				<div class="text-center">
					 		<img src="{{ asset('backend/assets/images/logo-icon.png') }}">
					 	</div>
					 <div class="card-title text-uppercase text-center py-3">Sign Up</div>
					    
                     <form method="POST" action="{{ route('register') }}">
                            @csrf

						  <div class="form-group">
						   <div class="position-relative has-icon-left">
							  <label for="name" class="sr-only">Full Name</label>
							  <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name"name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
							  <div class="form-control-position">
								  <i class="icon-user"></i>
							  </div>
                              @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						   </div>
						  </div>


						  <div class="form-group">
						   <div class="position-relative has-icon-left">
							  <label for="email" class="sr-only">Email ID</label>
							  <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email ID" value="{{ old('email') }}" required autocomplete="email">
							  <div class="form-control-position">
								  <i class="icon-envelope-open"></i>
							  </div>
						   </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						  </div>
						  <div class="form-group">
						   <div class="position-relative has-icon-left">
							  <label for="password" class="sr-only">Password</label>
							  <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                               placeholder="Password" name="password" required autocomplete="new-password">
							  <div class="form-control-position">
								  <i class="icon-lock"></i>
							  </div>
                              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						   </div>
						  </div>
						  <div class="form-group">
						   <div class="position-relative has-icon-left">
							  <label for="password-confirm" class="sr-only">Confirm Password</label>
							  <input type="password" id="password-confirm" class="form-control" placeholder="Confirm Password" 
                              name="password_confirmation" required autocomplete="new-password">
							  <div class="form-control-position">
								  <i class="icon-lock"></i>
							  </div>
						   </div>
						  </div>
						  <div class="form-group">
						   <div class="icheck-primary">
			                <input type="checkbox" id="user-checkbox" checked="" />
			                <label for="user-checkbox"><a href="#">I Accept terms & conditions</a></label>
						  </div>
						 </div>
						 <button type="submit" class="btn btn-outline-primary btn-block waves-effect waves-light">Sign Up</button>
						 <div class="text-center pt-3">   
                         <hr>
						 <p class="text-muted mb-0">Already have an account? <a href="{{ route('login') }}"> Sign In here</a></p>
						 </div>
					</form>
				 </div>
				</div>
	    	</div>
	     </div>
	    </div>
	    </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>
 
</body>

<!-- Mirrored from codervent.com/rocker/demo/authentication-signup2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Mar 2021 09:24:09 GMT -->
</html>
