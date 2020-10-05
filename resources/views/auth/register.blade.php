<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Job - Finder</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="http://www.topjobcambodia.com/favicon.ico" type="image/x-icon" rel="shortcut icon" />
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">


  </head>
  <body >

	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" style="background-color: ghostwhite">
	    <div class="container">
		  {{-- <a class="navbar-brand" href="index.html">Jobpply</a> --}}
		  <a class="navbar-brand"  href="/"> <img src="\images\job-finder-logo.png"  width="150px" ></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item cta mr-md-1"><a href="/login" class="nav-link">Post a Job</a></li>
	          <li class="nav-item cta cta-colored"><a href="#" class="nav-link">Upload CV</a></li>

	        </ul>
	      </div>
        </div>
      </nav>
        <div style="margin-top: 10%">
           <!-- Sign up form --> 
        <section class="signup">
            <div class="container1">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="/register" class="register-form" id="register-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="first_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="first_name" value="{{ old('first_name') }}" id="name" placeholder="First Name"/>
                            </div>
                            @error('first_name')
                                <span class=" text-danger ">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="last_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" id="name" placeholder="Last Name"/>
                            </div>
                            @error('last_name')
                                <span class=" text-danger ">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="web"><i class="#"><img src="/images/compay_name.png" height="20" width="20"></i></label>
                                <input type="text" name="company_name" value="{{ old('company_name') }}" id="company_name" placeholder="Company Nname"/>
                            </div>

                            <div class="form-group">
                                <label for="phone_number"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" name="phone_number" value="{{ old('phone_number') }}" id="name" placeholder="Phone number"/>
                            </div>
                            @error('phone_number')
                            <span class=" text-danger ">{{ $message }}</span>
                            @enderror

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" value="{{ old('email') }}" id="email" placeholder="Email"/>
                            </div>
                            @error('email')
                            <span class=" text-danger ">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" value="{{ old('password') }}" id="pass" placeholder="Password"/>
                            </div>
                            @error('password')
                            <span class=" text-danger ">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="re-password"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_confirmation" id="re_pass" placeholder="Repeat  password"/>
                            </div>
                            @error('re_password')
                            <span class=" text-danger ">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="web"><i class="#"><img src="/images/website.png" height="20" width="20"></i></label>
                                <input type="website" name="website" value="{{ old('website') }}" id="website" placeholder="e.g:www.yourwebsite.com"/>
                            </div>
                            @error('website')
                            <span class=" text-danger ">{{ $message }}</span>
                            @enderror

                            <div class="form-group">
                                <label class="text1">Please select your Profile </label>
                                <div class="col" style="margin-top: 25%">
                                    <input type="file" name="images" />
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">I am already member</a>
                    </div>
                </div>
                </div>
               
            </div>
        </div>
@include('header-fooder.fooder')