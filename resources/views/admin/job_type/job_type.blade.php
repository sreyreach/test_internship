@extends('admin.dashboard')
@section('content')
<div class="panel-body pn">

    <div class="col-md-12 no-padding">

        {{-- <div style="margin-left:-1.5%">
            <div id="topbar">
                <img id="dotdotdot" src="/images/dotdotdot.png">
            </div>   
        </div>     --}}
        <form method="GET" action="/search_jobtype">
            <input type="text" class="search" name="search" placeholder="Search..."></input>
            <button class="btn btn-primary">Search</button>
        </form>
           <div class="panel-heading bg-primary" style="margin-top: 10px">
            <span class="panel-title">
                <span  style=" margin-left:1%"></span></span>
            <div class="pull-right">
                <a href="{{ route('adminjobtype.create')}}">
                <span class="fa fa-plus" style="color:#fff; margin-left:-15%"></span>
            </a>
            </div>
        </div>
    </div>

   <table class="table table-hover tablesorter" id="tblRoom">
       <thead>
           <tr>
               <th>№</th>
               <th name="email">Location</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
        @foreach ($jobtype as $data)
            <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->job_type}}</td>
                <td class="icon-button">
                    {{-- <a title="show info" href="#"><span class="fa fa fa-book text-yellow"></span> </a> &nbsp;|&nbsp;  --}}
                           
                    <a title="edit" href="{{ route('adminjobtype.edit', $data)}}"><span class="fa fa-pencil"></span> </a> |

                    <a class="delete_confirm" href="{{ url('/jobtype/'.$data->id.'/destroy') }}" onclick="return confirm('Are you sure you want to delete this item?');"><span class="fa fa-trash"></span> </a>
                </td>
            </tr>
        @endforeach
        </tbody>
   </table>
   {!! $jobtype->links() !!}
</div>
</main>
</form>
<div>


@endsection