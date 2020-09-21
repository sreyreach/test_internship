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
                <span  style=" margin-left:1%"></span> </span>
            <div class="pull-right">
                
                <span class="fa fa-plus" style="color:#fff; margin-left:-15%"></span>
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
        {{-- @foreach ($user as $data) --}}
            <tr>
                <td></td>
                <td>
                    @if (Auth::user() == null)
                        <img onerror="this.style.display='none'" src="\images\photo.jpg" height="70px" width="70px">
                    @else
                    <img onerror="this.style.display='none'" src="url({{ Auth::user()->images }})">
                    @endif
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="icon-button">
                    <a title="Change Password" href="#"><span class="fa fa fa-key text-yellow"></span> </a> &nbsp;|&nbsp; 
                           
                    <a href="#"><span class="fa fa-pencil"></span> </a> |

                    <a class="delete_confirm" href="javascript:void(0)" title="Are you sure want to delete ?" data-href="#"><span class="fa fa-trash"></span> </a>
                </td>
            </tr>
        {{-- @endforeach --}}
        </tbody>
   </table>
</div>
</main>
</form>
<div>


@endsection