@include('header-fooder.header')

<div class="row-1" style="margin: 10%; margin-left: 20%">
     @foreach ($jobs as $item)
    <div data-v-552e6ab7="" class="uk-flex inner-item" style="background-color: #fff">
       
        <div data-v-552e6ab7="" class="section-1">
            <div data-v-552e6ab7="" class="img-wrapper" class="logo">
                {{-- {{ $item->company_profile }} --}}
                {{-- <img data-v-552e6ab7="" src="https://pelprek.sgp1.digitaloceanspaces.com/logo/2193/small-153371691554338.png" class="logo"> --}}
                <img src="{{ URL::to('/') }}/images//{{ $item->company_profile}}"class="img-thumbnail" width="75"/>
            </div>
        </div>
       
        <div data-v-552e6ab7="" class="section-2">
            <div data-v-552e6ab7="" style="overflow: hidden;">
                <h2 data-v-552e6ab7="" class="job-item-title"> {{ $item->title }} </h2> 
                <div data-v-552e6ab7="" class="job-item-sub-title">
                    {{ $item->company }}
                </div> 
                <span data-v-552e6ab7="" class="job-item-location">{{ $item->jobType->job_type }}&nbsp;&nbsp;&nbsp;&nbsp; {{ $item->location->location }}</span>
                <br>
                <span data-v-552e6ab7="" class="package__diamond">Top</span>
                </div>
            </div> 
            <div data-v-552e6ab7="" class="package">
                <a data-v-552e6ab7="" id="toggle-quick-view-70320" class="view-job uk-visible@l" href="{{ url('show',$item->id)}}">View job</a> 
            </div>
        </div>
        <hr> 
        @endforeach                   
        <div data-v-552e6ab7="" class="uk-flex inner-item" style="background-color: #fff; margin-top:10%; width: 800px;">
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
@include('header-fooder.fooder')
