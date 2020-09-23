@extends('admin.dashboard')
@section('content')
<div class="panel-body pn">

    <div class="col-md-12 no-padding">

           <form name="" action="#" method="get">
                <div class="form-group">
                    <div class="col-lg-3" style="margin-left: 10%;margin-top:5px ">
                        <input type="text" name="q" class="form-control" value="" placeholder="Search for...">
                    </div>
                </div>
                
           </form>
           <div class="panel-heading bg-primary" style="margin-top: 10px">
            <span class="panel-title">
                <span  style=" margin-left:1%"></span></span>
            <div class="pull-right">
                <a href="#">
                <span class="fa fa-plus" style="color:#fff; margin-left:-15%"></span>
                </a>
            </div>
        </div>
    </div>

   <table class="table table-hover tablesorter" id="tblRoom">
       <thead>
           <tr>
               <th>№</th>
               <th>Photo</th>
               <th name="title">Title</th>
               <th name="job_type">Job Type</i></th>
               <th name="company">Company Name</th>
               <th name="lacation_id">Location</th>
               <th name="post_date">Post date</th>
               <th name="closing_date">Closing date</th>
               <th name="user_id">User Id</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
        @foreach ($postjob as $data)
            <tr>
            <td>{{ $data->id }}</td>
            <td style="text-align:center">
                <img src="{{ URL::to('/') }}/images//{{ $data->company_profile}}"class="img-thumbnail" width="75"/>
            </td>
            <td>{{ $data->title              }}</td>
            <td>{{ $data->job_type           }}</td>
            <td>{{ $data->company            }}</td>
            <td>{{ $data->location->location }}</td>
            <td>{{ $data->post_date          }}</td>
            <td>{{ $data->closing_date       }}</td>
            <td>{{ $data->user_id            }}</td>

                <td class="icon-button">
                    <a title="Show info" href="#"><span class="fa fa fa-book text-yellow"></span> </a> &nbsp;|&nbsp; 
                           
                    <a title="Show info" href="#"><span class="fa fa-pencil"></span></a> |

                    <a class="delete_confirm" href="#" onclick="return confirm('Are you sure you want to delete this item?');"><span class="fa fa-trash"></span> </a>
                </td>
            </tr>
        @endforeach
        </tbody>
   </table>
   {!! $postjob->links() !!}
</div>
</main>
</form>
<div>


@endsection