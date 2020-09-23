@extends('admin.dashboard')
@section('content')
<div class="panel-body pn">

    <div class="col-md-12 no-padding">

        {{-- <div style="margin-left:-1.5%">
            <div id="topbar">
                <img id="dotdotdot" src="/images/dotdotdot.png">
            </div>   
        </div>     --}}
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
               <th name="email">Title</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
        @foreach ($category as $data)
            <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->title}}</td>
                <td class="icon-button">
                    <a title="show info" href="#"><span class="fa fa fa-book text-yellow"></span> </a> &nbsp;|&nbsp; 
                           
                    <a title="edit" href="#"><span class="fa fa-pencil"></span> </a> |

                    <a class="delete_confirm" href="#" onclick="return confirm('Are you sure you want to delete this item?');"><span class="fa fa-trash"></span> </a>
                </td>
            </tr>
        @endforeach
        </tbody>
   </table>
   {!! $category->links() !!}
</div>
</main>
</form>
<div>


@endsection