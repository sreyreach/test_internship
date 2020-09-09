<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Job - Finder</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('http://www.topjobcambodia.com/favicon.ico') }}" type="image/x-icon" rel="shortcut icon" />
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">

    
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   {{-- Summernote --}}
   <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css') }}">
   {{-- ENd --}}
  </head>
  <body style="background-color: #ffff">
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" >
	    <div class="container">
	      <a class="navbar-brand" href="/"><img src="\images\logo.png"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="/view" class="nav-link">Want a Job</a></li>
	          <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
	          <li class="nav-item cta mr-md-1"><a href="/login" class="nav-link">Post a Job</a></li>
	          <li class="nav-item cta cta-colored"><a href="#" class="nav-link">Upload CV</a></li>
            
            <li class="nav-item dropdown"> 
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{-- {{ user()->name }} --}}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();" >
                  {{ __('Logout') }}
                </a>
      
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    <div class="ftco-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate text-center text-md-left mb-5">
          	<p class="breadcrumbs mb-0"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>New Job Post</span></p>
            <h1 class="mb-3 bread">Edit Post Job</h1>
          </div>
          <div class="col-md-12 col-lg-8 mb-5">
          
          <form method="POST" action="{{ url('update',$job->id)}}" enctype="multipart/form-data" class="p-5 bg-white">
            {{ csrf_field() }}
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

              <div class="col-md mr-md-2">
                <div class="form-group">
                  <div class="form-field" style="margin-left: -3%">
                    <label for="option-job-type-4" style="font-weight: 700 !important;">Job Title</label>
                    <select name="title" id="" class="form-control">
                      <option value="Title">Title</option>
                      <option value="Advertising">Advertising</option>
                      <option value="Accounting">Accounting</option>
                      <option value="Customer Service">Customer Service</option>
                      <option value="Education & Training">Education & Training</option>
                      <option value="E-Commerce">E-Commerce</option>
                      <option value="Graphic Designer">Graphic Designer</option>
                      <option value="Marketing & Sales">Marketing & Sales</option>
                      <option value="Multimedia">Multimedia</option>
                      <option value="Office & Admin">Office & Admin</option>
                      <option value="Project Management">Project Management</option>
                      <option value="PHP Programmingg">PHP Programmingg</option>
                      <option value="Software Development">Software Development</option>
                      <option value="Social Media">Social Media</option>
                      <option value="Web Developmen">Web Development</option>
                      <option value="Web Designer">Web Designer</option>
                    </select>
                  </div>
                </div>
              </div>

              @error('title')
              <span class=" text-danger ">{{ $message }}</span>
              @enderror

              <div class="row form-group mb-5">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Company</label>
                  <input type="text" name="company" value="{{ $job->company }}"  id="fullname" class="form-control" placeholder="eg. Facebook, Inc.">
                </div>
              </div>
              
              @error('company')
              <span class=" text-danger ">{{ $message }}</span>
              @enderror

              <div class="row form-group mb-5">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Posting Date</label>
                  <input type="text" name="post_date" value="{{ $job->post_date }}"  id="fullname" class="form-control" placeholder="Date: DD\MM\YYY">
                </div>
              </div>
              
              @error('post_date')
              <span class=" text-danger ">{{ $message }}</span>
              @enderror

              <div class="row form-group mb-5">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Closing Date</label>
                  <input type="text" name="closing_date" value="{{ $job->closing_date }}"  id="fullname" class="form-control" placeholder="Deadline: DD\MM\YYY">
                </div>
              </div>
              
              @error('clos_date')
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
                    <select name="location" id="" class="form-control">
                      <option value="Location">Location</option>
                      <option value="Phnom Penh">Phnom Penh</option>
                      <option value="Banteay Meanchey">Banteay Meanchey</option>
                      <option value="Battambang">Battambang</option>
                      <option value="Kampong Cham">Kampong Cham</option>
                      <option value="Kampong Chhnang">Kampong Chhnang</option>
                      <option value="Kampong Som">Kampong Som</option>
                      <option value="Kampong Speu">Kampong Speu</option>
                      <option value="Kampong Thom">Kampong Thom</option>
                      <option value="Kampot">Kampot</option>
                      <option value="Kandal">Kandal</option>
                      <option value="Kep">Kep</option>
                      <option value="Koh Kong">Koh Kong</option>
                      <option value="Mondulkiri">Mondulkiri</option>
                      <option value="Oddar Meanchey">Oddar Meanchey</option>
                      <option value="Overseas">Overseas</option>
                      <option value="Pailin">Pailin</option>
                      <option value="Preah Vihear">Preah Vihear</option>
                      <option value="Prey Veng">Prey Veng</option>
                      <option value="Pursat">Pursat</option>
                      <option value="Ratanakiri">Ratanakiri</option>
                      <option value="Siem Reap">Siem Reap</option>
                      <option value="Steung Treng">Steung Treng</option>
                      <option value="Svay Rieng">Svay Rieng</option>
                      <option value="Takeo">Takeo</option>
                      <option value="Tbong Khmum">Tbong Khmum</option>
                    </select>
                  </div>
                </div>
              </div>

              @error('location')
              <span class=" text-danger ">{{ $message }}</span>
              @enderror

              <div class="row form-group">
                <div class="col-md-12"><h3>Company Profile</h3></div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <textarea id="summernote" name="company_description" >{{ $job->company_description }}}</textarea>
                </div>
              </div>

              @error('company_description')
              <span class=" text-danger ">{{ $message }}</span>
              @enderror

              <div class="row form-group">
                <div class="col-md-12"><h3>Job Description</h3></div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <textarea id="summernote2" name="job_description" >{{ $job->job_description }}</textarea>
                </div>
              </div>

              @error('job_description')
              <span class=" text-danger ">{{ $message }}</span>
              @enderror

              <div class="row form-group">
                <div class="col-md-12"><h3>How to Apply</h3></div>
                <div class="col-md-12 mb-3 mb-md-0">
                  <textarea id="summernote3" name="apply"  >{{ $job->apply }}</textarea>
                </div>
              </div>

              @error('apply')
              <span class=" text-danger ">{{ $message }}</span>
              @enderror

              <div class="form-group">
                <label class="text1">Please select your Company Profile </label>
                <div class="col1">
                 <input type="file" name="company_profile" value="{{ $job->company_profile}}"/>
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
        {{-- @endforeach  --}}
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
 <script src="{{ asset('https://code.jquery.com/jquery-3.2.1.slim.min.js') }}"></script>
 <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js') }}"></script>
 <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js') }}"></script>
 <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css') }}" rel="stylesheet">
 <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js') }}"></script>
 {{-- End --}}
<script>
  $('textarea#summernote').summernote({
    placeholder: ' bootstrap 4',
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
    placeholder: 'Hello bootstrap 4',
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
    placeholder: 'Hello bootstrap 4',
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