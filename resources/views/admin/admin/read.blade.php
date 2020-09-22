@extends('admin.dashboard')
@section('content')
<div class="jumbotron text-center">
    <h3>Profile:</h3>
    <img style="width: 300px; height: 300px;"src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" />
    <h3>First Name : {{ $user->first_name }}</h3>
    <h3>Last Name : {{ $user->last_name }}</h3>
    <h3>Company Name: {{ $user->company_name}}</h3>
    <h3>Email : {{ $user->email }}</h3>
    <h3>Phone Number : {{ $user->phone_number }}</h3>
    <h3>Website :{{ $user->website}}</h3>
</div>
@endsection