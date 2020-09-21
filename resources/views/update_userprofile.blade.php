<!DOCTYPE html>
<html lang="en">
<head>
	<link href="{{ asset('http://www.topjobcambodia.com/favicon.ico') }}" type="image/x-icon" rel="shortcut icon" />
	<link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/update/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/update/main.css') }}">

</head>
<body>
	@include('header-fooder.header')
	<div class="limiter" style="margin-top: -5%">
		<div class="container-login100" style="background-image: url('images/b.png');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form method="POST" action="{{ url('update/user', Auth::user()->id)}}" enctype="multipart/form-data" class="login100-form validate-form">
					{{ csrf_field() }}
					<div class="login100-form-avatar">
						{{-- <img src="images/avatar-01.jpg" alt="AVATAR"> --}}
						<img src="  {{ url ( Auth::user()->images ) }} " alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						{{ Auth::user()->first_name.'  '.Auth::user()->last_name }}
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "first_name is required" >
						<input class="input100" type="text" name="first_name" value="{{ Auth::user()->first_name}}" placeholder="First Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					@error('first_name')
                        <span class=" text-danger ">{{ $message }}</span>
                    @enderror

					<div class="wrap-input100 validate-input m-b-10" data-validate = "last_name is required">
						<input class="input100" type="text" name="last_name" value="{{ Auth::user()->last_name}}" placeholder="Last Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					@error('last_name')
                        <span class=" text-danger ">{{ $message }}</span>
                    @enderror

					<div class="wrap-input100 validate-input m-b-10" data-validate = "company_name is required">
						<input class="input100" type="text" name="company_name" value="{{ Auth::user()->company_name}}" placeholder="Company Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="#"><img src="/images/compay_name.png" height="20" width="20"></i>
						</span>
					</div>

					@error('company_name')
                        <span class=" text-danger ">{{ $message }}</span>
                    @enderror

					<div class="wrap-input100 validate-input m-b-10" data-validate = "phone_number is required">
						<input class="input100" type="text" name="phone_number" value="{{ Auth::user()->phone_number}}" placeholder="Phone number">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone"></i>
						</span>
					</div>

					@error('phone_number')
                        <span class=" text-danger ">{{ $message }}</span>
                    @enderror

					<div class="wrap-input100 validate-input m-b-10" data-validate =  "website is required">
						<input class="input100" type="text" name="website" value="{{ Auth::user()->website}}" placeholder="Phone number">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="#"><img src="/images/website.png" height="20" width="20"></i>
						</span>
					</div>

					@error('website')
                        <span class=" text-danger ">{{ $message }}</span>
                    @enderror


					<div class="form-group">
						<label for="upload_image" class="text1" style="color: #ffff">Photo</label>
						<div class="col-lg-8">
							<button class="btn btn-info" class="col" id="select-photo">
								<input type="file" name="images" value="{{ Auth::user()->images}}"/> 
							</button>
							
						</div>
					</div>

					@error('images')
                        <span class=" text-danger ">{{ $message }}</span>
                    @enderror


					<div class="container-login100-form-btn p-t-10">
						<div class="login100-form-btn" style="font-size: 25%">
						  <input type="submit" value="Save" class="login100-form-btn" >
						</div>
					  </div>
				</form>
			</div>
		</div>
	</div>
	
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="js/main.js"></script>

@include('header-fooder.fooder')