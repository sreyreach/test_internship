@extends('admin.dashboard')
@section('content')
<div class="panel-body pn">

    <div class="col-md-12 no-padding">

           {{-- <form name="" action="#" method="get">
                <div class="form-group">
                    <div class="col-lg-3" style="margin-left: 10%;margin-top:5px ">
                        <input type="text" name="q" class="form-control" value="" placeholder="Search for...">
                    </div>
                </div>
                
           </form> --}}
            <form method="GET" action="\search_admin">
                <input type="text" class="search" name="search" placeholder="Search..."></input>
                <button class="btn btn-primary">Search</button>
            </form>
           <div class="panel-heading bg-primary" style="margin-top: 10px">
            <span class="panel-title">
                <span  style=" margin-left:1%"></span></span>
            <div class="pull-right">
                <a href="{{ route('admin.create') }}">
                <span class="fa fa-plus" style="color:#fff; margin-left:-15%"></span>
                </a>
            </div>
        </div>
    </div>

   <table class="table table-hover tablesorter" id="tblRoom">
       <thead>
           <tr>
               <th>№</th>
               <th name="email">Email</th>
               <th name="phone_number">Phone number</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
        @foreach ($user as $data)
            <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->email        }}</td>
            <td>{{ $data->phone_number }}</td>
            
           
                <td class="icon-button">
                    <a title="Show info" href="{{ route('admin.show', $data)}}"><span class="fa fa fa-book text-yellow"></span> </a> &nbsp;|&nbsp; 
                           
                    <a title="Show info" href="{{ route('admin.edit', $data)}}"><span class="fa fa-pencil"></span> </a> |

                    <a class="delete_confirm" href="{{ url('/admin/'.$data->id.'/destroy') }}" onclick="return confirm('Are you sure you want to delete this item?');"><span class="fa fa-trash"></span> </a>
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