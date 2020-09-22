@extends('admin.dashboard')
@section('content')
<div  style="font-family: 'Courier New', Courier, monospace; margin:5%; margin-top:-1%">
    <h5>Profile:</h5>
    <img style="width: 120px; height: 100px;"src="{{ URL::to('/') }}/{{ $user->images }}" class="img-thumbnail" />
    <h5>First Name : <b> {{ $user->first_name }}</h5>
    <h5>Last Name : <b>{{ $user->last_name }}</h5>
    <h5>Company Name: <b>{{ $user->company_name}}</h5>
    <h5>Email : <b>{{ $user->email }}</h5>
    <h5>Phone Number : <b>{{ $user->phone_number }}</h5>
    <h5>Website : <b>{{ $user->website}}</h5>
</div>
@endsection