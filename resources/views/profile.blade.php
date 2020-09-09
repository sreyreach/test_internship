<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Job - Finder</title>
  <link href="http://www.topjobcambodia.com/favicon.ico" type="image/x-icon" rel="shortcut icon" />
  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="css/apply.css">
  <link rel="stylesheet" href="css/app.css">
  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/profile.css">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

</head>

<body >
  <section id="container">
    <header class="header black-bg" style="height: 10%">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li>
						
						<a class="dropdown-item" href="{{ route('logout') }}"
						   onclick="event.preventDefault();
							 document.getElementById('logout-form').submit();" style="background-color: #00e6e6; margin-top:10%;text-align: center; ">
							{{ __('Logout') }}
						</a>
  
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</li>
        </ul>
      </div>
    </header>
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="#"><img src="  {{ url ( Auth::user()->images ) }} " class="img-circle" width="100" height="100"></a></p>
          <h5 class="centered">{{ Auth::user()->first_name.'  '.Auth::user()->last_name }}</h5>
          <li class="mt">
            <a class="active" href="/profile">
              <i class="fa fa-user"></i>
              <span>{{ Auth::user()->first_name.'  '.Auth::user()->last_name }}</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="/">
              <i class="fa fa-home"></i>
              <span>Home</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Post</span>
              </a>
            <ul class="sub">
              <li><a href="/login">Post Job</a></li>
              <li><a href="calendar.html">Post Cv</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="/edit">
              <i class="fa fa-edit"></i>
              <span>Edit Profile</span>
            </a>
          </li>
          <hr>
        </ul>
        {{-- <div style="margin-left:5%">
          <h5 >Content</h5>
          <div style="size: 10px">
            <i class="fa fa-phone"></i>
            <span> Number: {{ Auth::user()->phone_number }} </span>
          </div>
          <div style="size: 10px">
            <i class="fa fa-email"></i>
            <span> Number: {{ Auth::user()->email }} </span>
          </div>
        </div> --}}
      </div>
    </aside>
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <section class="ftco-section bg-light" style="margin: 0%">
            <div class="row-col" >
              @foreach ($jobs as $item)
             <div data-v-552e6ab7="" class="uk-flex inner-item" style="background-color: #fff">
                
                 <div data-v-552e6ab7="" class="section-1" style="margin-left: 5% ">
                     <div data-v-552e6ab7="" class="img-wrapper" class="logo">
                         {{-- {{ $item->company_profile }} --}}
                         {{-- <img data-v-552e6ab7="" src="https://pelprek.sgp1.digitaloceanspaces.com/logo/2193/small-153371691554338.png" class="logo"> --}}
                         <img src="{{ URL::to('/') }}/images//{{ $item->company_profile}}"class="img-thumbnail" width="75"/>
                     </div>
                 </div>
                
                 <div data-v-552e6ab7="" class="section-2" style="width: 75%">
                     <div data-v-552e6ab7="" style="overflow: hidden;">
                         <h2 data-v-552e6ab7="" class="job-item-title"> {{ $item->title}} </h2> 
                         <div data-v-552e6ab7="" class="job-item-sub-title">
                          {{ $item->company}}
                         </div> 
                         <span data-v-552e6ab7="" class="job-item-location">{{ $item->job_type}}&nbsp;&nbsp;&nbsp;&nbsp; {{ $item->location}}</span>
                         <br>
                         <span data-v-552e6ab7="" class="package__diamond">Top</span>
                         </div>
                     </div> 
                     <div data-v-552e6ab7="" class="package">
                      <a data-v-552e6ab7="" id="toggle-quick-view-70320" class="view-job uk-visible@l" href="{{ url('show',$item->id)}}">View job</a> 
                      </div>
                     <div data-v-552e6ab7="" class="package1">
                      <ul style="margin-left: 100%">
                        <li class="nav-item dropdown"> 
                          <a id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="\images\p.png" alt="" style="height: 35px; width: 35px;">
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            
                            <a class="dropdown-item" href="{{ url('edit',$item->id)}}" >
                              {{ __('Edit post') }}
                            </a>
                            <a class="dropdown-item" href="{{ url( 'destroy',$item->id) }}" >
                              {{ __('Delete') }}
                            </a>
                            
                          </div>
                        </li>
                      </ul>
                  </div>
                 </div>
                 <hr> 
                 @endforeach                   
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
          </div>
      </section>
          
      </section>
    </section>
   
    <!--footer end-->
  </section>
  {{-- @include('header-fooder.fooder') --}}
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
