<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Job - Finder</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="{{ asset('http://www.topjobcambodia.com/favicon.ico" type="image/x-icon" rel="shortcut icon') }}" />
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
  </head>

  <body>
@include('header-fooder.header')
    
    <div class="hero-wrap js-fullheight">
      <div class="overlay"></div>
      <div class="container-fluid px-0">
      	<div class="row d-md-flex no-gutters slider-text align-items-end js-fullheight justify-content-end">
	      	<img class="one-third align-self-end order-md-last img-fluid" src="images/undraw_work_time_lhoj.svg" alt="">
	        <div class="one-forth d-flex align-items-center ftco-animate js-fullheight">
	        	<div class="text mt-5">
	        		<p class="mb-4 mt-5 pt-5">We have <span class="number" data-number="200000">0</span> great job offers you deserve!</p>
	            <h1 class="mb-5">Largets Job Site In The World</h1>

							<div class="ftco-search">
								<div class="row">
			            <div class="col-md-12 nav-link-wrap">
				            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				              <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Find a Job</a>

				              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Find a Candidate</a>

				            </div>
				          </div>
				          <div class="col-md-12 tab-wrap">
				            
				            <div class="tab-content p-4" id="v-pills-tabContent">

				              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
								<form method="post" action="\search" class="search-job">
									@csrf
									  <div class="row no-gutters">
										  <div class="col-md mr-md-2">
											  <div class="form-group">
												  <div class="select-wrap">
													<div class="icon"><span class="ion-ios-arrow-down"></span></div>
													<div class="icon"><span class="icon-briefcase"></span></div>
													<select name="title" id="" class="form-control">
														<option value="Category">Category</option>
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
										  <div class="col-md mr-md-2">
											  <div class="form-group">
												  <div class="form-field">
													  <div class="select-wrap">
												  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
												  <select name="job_type" id="" class="form-control">
													<option value="">Type of Job</option>
													<option value="Full Tim">Full Time</option>
													<option value="Part Time">Part Time</option>
													<option value="Freelance">Freelance</option>
													<option value="Internship">Internship</option>
													<option value="Temporary">Temporary</option>
												  </select>
												</div>
												  </div>
											  </div>
										  </div>
										  <div class="col-md mr-md-2">
											  <div class="form-group">
												  <div class="form-field">
													  <div class="icon"><span class="icon-map-marker"></span></div>
													<select name="location" id="" class="form-control" >
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
										  <div class="col-md">
											  <div class="form-group">
												  <div class="form-field">
													<button type="submit" class="form-control btn btn-secondary">Search</button>
												  </div>
											  </div>
										  </div>
									  </div>
								  </form>
				              </div>

				              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
				              	<form action="#" class="search-job">
				              		<div class="row">
				              			<div class="col-md">
				              				<div class="form-group">
					              				<div class="form-field">
					              					<div class="icon"><span class="icon-user"></span></div>
									                <input type="text" class="form-control" placeholder="eg. Adam Scott">
									              </div>
								              </div>
				              			</div>
				              			<div class="col-md">
				              				<div class="form-group">
				              					<div class="form-field">
					              					<div class="select-wrap">
							                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
							                      <select name="" id="" class="form-control">
							                      	<option value="">Category</option>
							                      	<option value="">Full Time</option>
							                        <option value="">Part Time</option>
							                        <option value="">Freelance</option>
							                        <option value="">Internship</option>
							                        <option value="">Temporary</option>
							                      </select>
							                    </div>
									              </div>
								              </div>
				              			</div>
				              			<div class="col-md">
				              				<div class="form-group">
				              					<div class="form-field">
					              					<div class="icon"><span class="icon-map-marker"></span></div>
									                <input type="text" class="form-control" placeholder="Location">
									              </div>
								              </div>
				              			</div>
				              			<div class="col-md">
				              				<div class="form-group">
				              					<div class="form-field">
									                <button type="submit" class="form-control btn btn-secondary">Search</button>
									              </div>
								              </div>
				              			</div>
				              		</div>
				              	</form>
				              </div>
				            </div>
				          </div>
				        </div>
			        </div>
	          </div>
	        </div>
	    	</div>
      </div>
    </div>


	<section class="ftco-section bg-light" style="margin: 0%">
		<div class="row-1" style=" margin-left: 20%">
		@foreach ($jobs as $item)
	   <div data-v-552e6ab7="" class="uk-flex inner-item" style="background-color: #ffff">
		  
		   <div data-v-552e6ab7="" class="section-1" style="margin-left: 5% ">
			   <div data-v-552e6ab7="" class="img-wrapper">
				   {{-- {{ $item->company_profile }} --}}
				   {{-- <img data-v-552e6ab7="" src="https://pelprek.sgp1.digitaloceanspaces.com/logo/2193/small-153371691554338.png" class="logo"> --}}
				   <img src="{{ URL::to('/') }}/images//{{ $item->company_profile}}"class="img-thumbnail" width="75" class="logo"/>
			   </div>
		   </div>
		  
		   <div data-v-552e6ab7="" class="section-2">
					<div data-v-552e6ab7="" style="overflow: hidden;">
						<h2 data-v-552e6ab7="" class="job-item-title"> {{ $item->title }} </h2> 
						<div data-v-552e6ab7="" class="job-item-sub-title">
							{{ $item->company }}
						</div> 
						<span data-v-552e6ab7="" class="job-item-location">{{ $item->job_type }}&nbsp;&nbsp;&nbsp;	 {{ $item->location }}</span>
						<br>
						<span data-v-552e6ab7="" class="package__diamond">Top</span>
						<span data-v-552e6ab7="" class="job-item-location">{{ $item->created_at }}</span>
						</div>
					</div> 
		   	
			   
			   <div data-v-552e6ab7="" class="package">
			   <a data-v-552e6ab7="" id="toggle-quick-view-70320" class="view-job uk-visible@l" href="{{ url('show',$item->id)}}">View job</a> 
			   </div>
		   </div>
		   <hr> 
		   @endforeach 
		   {{-- {{ $jobs->links() }}                   --}}
		   <div data-v-552e6ab7="" class="uk-flex inner-item" style="background-color: #fff;  width: 800px;">
			   <div data-v-552e6ab7="" class="uk-flex uk-flex-center uk-flex-middle" style="height: 70px; padding-bottom: 10px;>
				   <div data-v-552e6ab7=">
					   <a data-v-552e6ab7="" href="#" class="btn-more">
						   <i data-v-552e6ab7="" class="fa fa-angle-down" aria-hidden="true"></i>
					   </a> 
					   <div data-v-552e6ab7="" uk-spinner="" class="waiting spin uk-spinner uk-icon" style="width: 20px; height: 20px; display: none;">
						   <svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg" ratio="1">
							   <circle fill="none" stroke="#000" cx="15" cy="15" r="14"></circle>
						   </svg>
					   </div>
				   </div> 
			   </div>
		   </div>
	   </div>
	</section>
	<section class="ftco-section services-section bg-primary">
		<div class="container">
		  <div class="row d-flex">
			<div class="col-md-3 d-flex align-self-stretch ftco-animate">
			  <div class="media block-6 services d-block">
				<div class="icon"><span class="flaticon-resume"></span></div>
				<div class="media-body">
				  <h3 class="heading mb-3">Search Millions of Jobs</h3>
				  <p>A small river named Duden flows by their place and supplies.</p>
				</div>
			  </div>      
			</div>
			<div class="col-md-3 d-flex align-self-stretch ftco-animate">
			  <div class="media block-6 services d-block">
				<div class="icon"><span class="flaticon-collaboration"></span></div>
				<div class="media-body">
				  <h3 class="heading mb-3">Easy To Manage Jobs</h3>
				  <p>A small river named Duden flows by their place and supplies.</p>
				</div>
			  </div>    
			</div>
			<div class="col-md-3 d-flex align-self-stretch ftco-animate">
			  <div class="media block-6 services d-block">
				<div class="icon"><span class="flaticon-promotions"></span></div>
				<div class="media-body">
				  <h3 class="heading mb-3">Top Careers</h3>
				  <p>A small river named Duden flows by their place and supplies.</p>
				</div>
			  </div>      
			</div>
			<div class="col-md-3 d-flex align-self-stretch ftco-animate">
			  <div class="media block-6 services d-block">
				<div class="icon"><span class="flaticon-employee"></span></div>
				<div class="media-body">
				  <h3 class="heading mb-3">Search Expert Candidates</h3>
				  <p>A small river named Duden flows by their place and supplies.</p>
				</div>
			  </div>      
			</div>
		  </div>
		</div>
	  </section>
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Job Categories</span>
            <h2 class="mb-4">Top Categories</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-3 ftco-animate">
        		<ul class="category">
        			<li><a href="/view_categories">Web Development <br><span class="number">354</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="/view_categories">Graphic Designer <br><span class="number">143</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="/view_categories">Multimedia <br><span class="number">100</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="/view_categories">Advertising <br><span class="number">90</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        		</ul>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<ul class="category">
        			<li><a href="#">Education &amp; Training <br><span class="number">100</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Accounting <br><span class="number">200</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Social Media <br><span class="number">300</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">E-commerce <br><span class="number">150</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        		</ul>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<ul class="category">
        			<li><a href="#">PHP Programming <br><span class="number">400</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Project Management <br><span class="number">100</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Finance Management <br><span class="number">222</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Office &amp; Admin <br><span class="number">123</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        		</ul>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<ul class="category">
        			<li><a href="#">Web Designer <br><span class="number">324</span> <span>Open position</span></span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Customer Service <br><span class="number">564</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Marketing &amp; Sales <br><span class="number">234</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Software Development <br><span class="number">425</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        		</ul>
        	</div>
        </div>
    	</div>
    </section>
	<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(&quot;images/bg_1.jpg&quot;); background-position: 50% -114px;" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-12">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon">
		              		<span class="flaticon-employee"></span>
		              	</div>
		                <strong class="number" data-number="435000">435,000</strong>
		                <span>Jobs</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon">
		              		<span class="flaticon-collaboration"></span>
		              	</div>
		                <strong class="number" data-number="40000">40,000</strong>
		                <span>Members</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon">
		              		<span class="flaticon-resume"></span>
		              	</div>
		                <strong class="number" data-number="30000">30,000</strong>
		                <span>Resume</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon">
		              		<span class="flaticon-promotions"></span>
		              	</div>
		                <strong class="number" data-number="10500">10,500</strong>
		                <span>Company</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>
   

		
@include('header-fooder.fooder')