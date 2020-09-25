@extends('admin.dashboard')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="post" id="form" action="{{ route('adminlocation.store')}}" enctype="multipart/form-data" style="margin:80px" >

    @csrf
    <div class="form-group">
        <div class="row">
                <h2 style="color:#334d4d; margin-left: 200px;margin-top: -50px;"><b style="font-size: x-large;">Add Location</b></h2>
        </div>
        <label class="class= text1" style="margin-left: 80px;"><b>Location</label>
        <div class="col1">
            <input type="text" name="location" value="{{ old('location') }}" class="form-control input-lg" style="    margin-left: -150px"/>
        </div>
        
        <div class="form-group text-center">
            <input type="submit" name="create" class="btn btn-primary input-lg" style="margin-left: 150px;
            margin-top: 15px;" value="create" />
        </div>

    </div>
</form> 
@endsection