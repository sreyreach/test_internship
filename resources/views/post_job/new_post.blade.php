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
    <!-- END nav -->
    
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-8 ftco-animate text-center text-md-left mb-5">
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>New Job Post</span></p>
            <h1 class="mb-3 bread">Post A Job</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="ftco-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
          
          <form method="POST" action="{{route('postjob.store')}}" enctype="multipart/form-data" class="p-5 bg-white">
            @csrf
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label for="option-price-1">
                    <input type="checkbox" id="option-price-1"> <span class="text-success">$500</span> For 30 days
                  </label>
                </div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <label for="option-price-2">
                    <input type="checkbox" id="option-price-2"> <span class="text-success">$300</span> / Monthly Recurring
                  </label>
                </div>
              </div>

              <div class="row form-group mb-5">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Title</label>
                  <input type="text" name="title" value="{{ old('title')}}"  id="fullname" class="form-control" placeholder="Title">
                </div>
              </div>

              <div class="col-md mr-md-2">
                <div class="form-group">
                  <div class="form-field" style="margin-left: -3%">
                    <label for="option-job-type-4" style="font-weight: 700 !important;">Job Title</label>
                    <select name="category_id" id="" class="form-control">
                      @foreach ( $category as $item)
                    <option value="{{ $item->id }}">{{ $item->title}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              @error('category_id')
              <span class=" text-danger ">{{ $message }}</span>
              @enderror

              <div class="row form-group mb-5">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Company</label>
                  <input type="text" name="company" value="{{ Auth::user()->company_name }}"  id="fullname" class="form-control" placeholder="eg. Facebook, Inc.">
                </div>
              </div>
              
              @error('company')
              <span class=" text-danger ">{{ $message }}</span>
              @enderror

              <div class="row form-group mb-5">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Posting Date</label>
                  <input type="text" name="post_date" value="{{ old('post_date')}}"  id="fullname" class="form-control" placeholder="Date: DD\MM\YYY">
                </div>
              </div>
              
              @error('post_date')
              <span class=" text-danger ">{{ $message }}</span>
              @enderror

              <div class="row form-group mb-5">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Closing Date</label>
                  <input type="text" name="closing_date" value="{{ old('closing_date')}}"  id="fullname" class="form-control" placeholder="Deadline: DD\MM\YYY">
                </div>
              </div>
              
              @error('closing_date')
              <span class=" text-danger ">{{ $message }}</span>
              @enderror

              <div class="row form-group">
                <div class="col-md-12"><h3>Job Type</h3></div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <label for="option-job-type-1">
                    <input type="radio" name="job_type" value=" Full Time" id="option-job-type-1"> Full Time
                  </label>
                </div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <label for="option-job-type-2">
                    <input type="radio" name="job_type" value="Part Time" id="option-job-type-1"> Part Time
                  </label>
                </div>
                
                <div class="col-md-12 mb-3 mb-md-0">
                  <label for="option-job-type-3">
                    <input type="radio" name="job_type" value=" Freelance" id="option-job-type-1"> Freelance
                </div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <label for="option-job-type-4">
                    <input type="radio" name="job_type" value=" Internship" id="option-job-type-1"> Internship
                  </label>
                </div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <label for="option-job-type-4">
                    <input type="radio" name="job_type" value=" Termporary" id="option-job-type-1"> Termporary
                  </label>
                </div>
              </div>

              @error('job_type')
              <span class=" text-danger ">{{ $message }}</span>
              @enderror

              <div class="col-md mr-md-2">
                <div class="form-group">
                  <div class="form-field" style="margin-left: -3%">
                    <label for="option-job-type-4" style="font-weight: 700 !important;">Location</label>
                    <select name="location_id" id="" class="form-control">
                      @foreach ( $location as $item)
                      <option value="{{ $item->id }}">{{ $item->location}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
              </div>

              @error('location_id')
              <span class=" text-danger ">{{ $message }}</span>
              @enderror

              <div class="row form-group">
                <div class="col-md-12"><h3>Company Profile</h3></div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <textarea id="summernote" name="company_description" value="" >{!! old('company_description') !!}</textarea>
                </div>
              </div>

              @error('company_description')
              <span class=" text-danger ">{{ $message }}</span>
              @enderror

              <div class="row form-group">
                <div class="col-md-12"><h3>Job Description</h3></div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <textarea id="summernote2" name="job_description" value="" >{!! old('job_description')!!}</textarea>
                </div>
              </div>

              @error('job_description')
              <span class=" text-danger ">{{ $message }}</span>
              @enderror

              <div class="row form-group">
                <div class="col-md-12"><h3>How to Apply</h3></div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <textarea id="summernote3" name="apply" value="">{!! old('apply') !!}</textarea>
                </div>
              </div>

              @error('apply')
              <span class=" text-danger ">{{ $message }}</span>
              @enderror

              <div class="form-group">
                <label class="text1">Please select your Company Profile </label>
                <div class="col1">
                    <input type="file" name="company_profile"/>
                </div>
            </div>
            @error('company_profile')
            <span class=" text-danger ">{{ $message }}</span>
            @enderror
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Post" class="btn btn-primary  py-2 px-5">
                </div>
              </div>

  
            </form>
          </div>

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Contact Info</h3>
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">	#272A, St.150, Sangkat Teuk Laork || Phnom Penh, Cambodia 12250</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">+855 965356723</a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="#"><span class="__cf_email__" data-cfemail="671e081215020a060e0b2703080a060e094904080a">[email&#160;protected]</span></a></p>

            </div>
            
            
          </div>
        </div>
      </div>
    </div>
		
		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-12">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@include('header-fooder.fooder')
 {{-- Summernote --}}
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
 {{-- End --}}
<script>
  $('textarea#summernote').summernote({
    placeholder: 'company profile',
    tabsize: 2,
    height: 100,
toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'italic', 'underline', 'clear']],
    // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
    //['fontname', ['fontname']],
   // ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'hr']],
    //['view', ['fullscreen', 'codeview']],
    ['help', ['help']]
  ],
  });
  $('#summernote2').summernote({
    placeholder: 'description',
    tabsize: 2,
    height: 100,
toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'italic', 'underline', 'clear']],
    // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
    //['fontname', ['fontname']],
   // ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'hr']],
    //['view', ['fullscreen', 'codeview']],
    ['help', ['help']]
  ],
  });
  $('#summernote3').summernote({
    placeholder: 'how to apply',
    tabsize: 2,
    height: 100,
toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'italic', 'underline', 'clear']],
    // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
    //['fontname', ['fontname']],
   // ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'hr']],
    //['view', ['fullscreen', 'codeview']],
    ['help', ['help']]
  ],
  });
</script>

  </body>
</html>