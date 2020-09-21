<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Job - Finder</title>
    <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <link href="{{ asset('http://www.topjobcambodia.com/favicon.ico') }}" type="image/x-icon" rel="shortcut icon" />
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900') }}" rel="stylesheet">

    <link rel="stylesheet" type="{{ asset('text/css" href="css/update/util.css') }}">
	  <link rel="stylesheet" type="{{ asset('text/css" href="css/update/main.css') }}">

    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
	  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
	  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
	  <link rel="stylesheet" href="{{ asset('css/apply.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" rel="stylesheet">

	  <!-- Styles -->
	  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-grid.css') }}" />
	  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
	  <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" />
	  <link rel="stylesheet" type="text/css" href="{{ asset('css/chosen.css') }}" />
	  <link rel="stylesheet" type="text/css" href="{{ asset('css/colors/colors.css') }}" />
	  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css') }}" />

  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
		  {{-- <a class="navbar-brand" href="index.html">Jobpply</a> --}}
		  <a class="navbar-brand"  href="/"> <img src="\images\logo.png" ></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
	          <li class="nav-item cta mr-md-1"><a href="/login" class="nav-link">Post a Job</a></li>
	          <li class="nav-item cta cta-colored"><a href="#" class="nav-link">Upload CV</a></li>
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{-- {{ user()->name }} --}}
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  {{-- <a class="dropdown-item" href="#"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    {{ __('View post Job') }}
                  </a> --}}
                  <a class="dropdown-item" href="/my_post" >
                    {{ __('View post Job') }}
                  </a>
                  {{-- <a class="dropdown-item" href="{{url('edit/user',Auth::user()->id)}}" >
                    {{ __('Edit Profile') }}
                  </a> --}}
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>
          <li class="#" style="margin-top:2%" >
            <a href="" class="image_profile">
              {{-- <div class="user-img mb-4" style="background-image: url(images/sreyreach.jpg); width:40%;  height: 70%;border-radius: 50%;"> --}}
                @if (Auth::user() == null)
                  <div class="user-img mb-4" style="background-image: url(images/user.png); width:25px;  height: 25px;border-radius: 50%; ">
                @else
                  <div class="user-img mb-4" style="background-image: url({{ Auth::user()->images }}); width:25px;  height:25px;border-radius: 50%;">
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
  </body>
</html>