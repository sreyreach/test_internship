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
   {{-- Summernote --}}
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
   {{-- ENd --}}
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" >
	    <div class="container" >
	      <a class="navbar-brand" href="/"><img src="\images\logo.png"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav" >
	        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="/" class="nav-link" style="color: #fff">Home</a></li>
	          <li class="nav-item"><a href="/about" class="nav-link" style="color: #fff">About</a></li>
	          <li class="nav-item"><a href="/view" class="nav-link" style="color: #fff">Want a Job</a></li>
	          <li class="nav-item"><a href="/contact" class="nav-link" style="color: #fff">Contact</a></li>
	          <li class="nav-item cta mr-md-1"><a href="/login" class="nav-link" >Post a Job</a></li>
	          <li class="nav-item cta cta-colored"><a href="#" class="nav-link">Upload CV</a></li>
            
            <li class="nav-item dropdown" style="color: #fff"> 
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: #fff">
                {{-- {{ user()->name }} --}}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
                
                <a class="dropdown-item"  href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();" >
                  {{ __('Logout') }}
                </a>
      
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
            <li class="#" >
              <a href="/profile" class="image_profile">
                {{-- <div class="user-img mb-4" style="background-image: url(images/sreyreach.jpg); width:40%;  height: 70%;border-radius: 50%;"> --}}
                  @if (Auth::user() == null)
                    <div class="user-img mb-4" style="background-image: url(images/user.png); width:40%;  height: 70%;border-radius: 50%;">
                  @else
                    <div class="user-img mb-4" style="background-image: url({{ Auth::user()->images }}); width:40%;  height: 70%;border-radius: 50%;">
                  @endif
                  
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="profile">
                      {{-- <img src=" url(images/sreyreach.jpg)"> --}}
                      {{-- <img src="{{ URL::to('/') }}/images//{{ $item->images}}"class="img-thumbnail" width="75" class="logo"/> --}}
                    </i>
                  </span>
                  </div>
              </a>
            </li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <form method="POST" action="{{ route('job_type.store') }}" enctype="multipart/form-data" class="p-5 bg-white">
    @csrf
      <div class="row form-group">

        <div class="row form-group mb-5">
            <div class="col-md-12 mb-3 mb-md-0">
            <label class="font-weight-bold" for="fullname">Job Type</label>
            <input type="text" name="job_type" value=""  id="fullname" class="form-control" placeholder="Job type">
            </div>
        </div>
        
        @error('job_type')
        <span class=" text-danger ">{{ $message }}</span>
        @enderror
      </div>
      <div class="row form-group">
        <div class="col-md-12">
          <input type="submit" value="Post" class="btn btn-primary  py-2 px-5">
        </div>
      </div>
      

</form>
  </body>
</html>

