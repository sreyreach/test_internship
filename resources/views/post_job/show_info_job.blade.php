@include('header-fooder.header')
<div class="row-1" style=" margin-left: 300% ; margin: 10%;  height: auto; background-color:#e6ffff ; width:70%">
    
    <div data-v-552e6ab7="" class="uk-flex inner-item" >
       {{-- <div id="left" style="background-color:#e6ffff"> --}}
            <div data-v-552e6ab7="" class="section-1">
                <div data-v-552e6ab7="" class="img-wrapper" style="margin:10%; ">
                    {{-- {{ $jobs->company_profile }} --}}
                    {{-- <img data-v-552e6ab7="" src="https://pelprek.sgp1.digitaloceanspaces.com/logo/2193/small-153371691554338.png" class="logo"> --}}
                    <img src="{{ URL::to('/') }}/images//{{ $jobs->company_profile}}"class="img-thumbnail" width="200" height="100"  class="logo" style="margin-left: 10% ; margin-top:20%"/>
                </div>
            </div>
        {{-- </div> --}}
       {{-- <div id="right">   
        --}}
            <div data-v-552e6ab7="" class="section-2"style="margin-top:25%; margin-left:-17%" >
                <div data-v-552e6ab7="" style="overflow: hidden;">
                    <h2 data-v-552e6ab7="" class="job-item-title1" style=" font-weight: 700; color:royalblue; font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif; font-size: revert;"> 
                        {{ $jobs->title }} 
                    </h2> 
                    <div data-v-552e6ab7="" class="job-item-sub-title" style="margin-top: -2%; margin-left:0px">
                        {{ $jobs->company }}
                    </div> 
                    <span data-v-552e6ab7="" class="job-item-location" style="margin-left:0px"> {{ $jobs->updated_at }}&nbsp;&nbsp;&nbsp;&nbsp; {{ $jobs->location->location }}</span>
                    <span data-v-552e6ab7="" class="package__diamond"></span>
                    </div>
                </div>
            </div>    
        {{-- </div>     --}}
      <hr>
        <div data-v-552e6ab7="" class="section-2" style="margin-left: 5%">
            <div data-v-552e6ab7="" style="overflow: hidden;">
                <h6 data-v-552e6ab7="" class="job-item-title1">Posting Date: &nbsp;{{ $jobs->post_date }}</h6> 
            </div>
        </div>
        <div data-v-552e6ab7="" class="section-2" style="margin-left: 5%">
            <div data-v-552e6ab7="" style="overflow: hidden;">
                <h6 data-v-552e6ab7="" class="job-item-title1">Closing Date: &nbsp;{{ $jobs->closing_date }} </h6> 
            </div>
        </div>
        <div data-v-552e6ab7="" class="section-2" style="margin-left: 5%">
            <div data-v-552e6ab7="" style="overflow: hidden;">
                <h6 data-v-552e6ab7="" class="job-item-title1">Job Type:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $jobs->jobType->job_type }} </h6> 
            </div>
        </div>
        <div data-v-552e6ab7="" class="section-2" style="margin-left: 5%">
            <div data-v-552e6ab7="" style="overflow: hidden;">
                <h6 data-v-552e6ab7="" class="job-item-title1">Location:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $jobs->location->location }}</h6> 
            </div>
        </div>
       <div data-v-552e6ab7="" class="section-2" style="margin-left: 5%">
            <div data-v-552e6ab7="" style="overflow: hidden;">
                <h2 data-v-552e6ab7="" class="job-item-title">Company Profile</h2> 
                <div data-v-552e6ab7=""  style="margin-left:5%; margin-right:5%">
                    <span style="" class="des">
                        {!! $jobs->company_description !!}
                    </span>
                </div> 
            </div>
       </div>
        <div data-v-552e6ab7="" class="section-2" style="margin-left: 5% ">
            <div data-v-552e6ab7="" style="overflow: hidden;">
                <h2 data-v-552e6ab7="" class="job-item-title">Description</h2> 
                <div data-v-552e6ab7=""  style="margin-left:5%; margin-right:5%">
                    <span style="" class="des">
                    {!! $jobs->job_description !!}
                    </span>
                </div> 
            </div>
        </div>
        <div data-v-552e6ab7="" class="section-2" style="margin-left: 5%; margin-right:5%">
            <div data-v-552e6ab7="" style="overflow: hidden;">
                <h2 data-v-552e6ab7="" class="job-item-title">How to apply</h2> 
                <div data-v-552e6ab7="" style="margin-left:5%; margin-right:5% ">
                    {{-- <span style="word-wrap:break-word;width:100%;display:block; font: initial; 
                    font-size: inherit; font-style: unset; font-family: inherit;margin-left:-7% "> --}}
                    <span style="" class="des">
                        {!! $jobs->apply !!}
                    </span>
                    
                </div> 
            </div>
        </div>
        <div align="right" style="margin: 10%, maring-top:-5%">
            <i >
                <a href="/"class="nav-link" class="btn btn-default">Back</a>
            </i>
            
        </div>
          
    </div>
       
      
    {{-- @endforeach                    --}}
       
       
</div>


@include('header-fooder.fooder')