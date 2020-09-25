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
                <a href="{{ route('employer.create') }}">
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
               <th name="first_name">First Name</th>
               <th name="last_name">Last Name</i></th>
               <th name="company_name">Company Name</th>
               <th name="phone_number">Phone number</th>
               <th name="email">Email</th>
               <th name="website">Website</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
        @foreach ($user as $data)
            <tr>
            <td>{{ $data->id }}</td>
            <td style="text-align:center">
                <img src="{{ URL::to('/') }}/{{ $data->images}}"class="img-thumbnail" width="75"/>
            </td>
            <td>{{ $data->first_name   }}</td>
            <td>{{ $data->last_name    }}</td>
            <td>{{ $data->company_name }}</td>
            <td>{{ $data->phone_number }}</td>
            <td>{{ $data->email        }}</td>
            <td>{{ $data->website      }}</td>
                <td class="icon-button">
                    <a title="show info" href="{{ route('employer.show', $data) }}"><span class="fa fa fa-book text-yellow"></span> </a> &nbsp;|&nbsp; 
                           
                    <a title="edit" href="{{ route('employer.edit', $data) }}"><span class="fa fa-pencil"></span> </a> |

                    <a class="delete_confirm" href="{{ url('/employer/'.$data->id.'/destroy') }}" onclick="return confirm('Are you sure you want to delete this item?');"><span class="fa fa-trash"></span> </a>
                </td>
            </tr>
        @endforeach
        </tbody>
   </table>
   {!! $user->links() !!}
</div>
</main>
</form>
<div>


@endsection