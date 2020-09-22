<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('http://www.topjobcambodia.com/favicon.ico') }}" type="image/x-icon" rel="shortcut icon" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Finder - Admin</title>
    <link rel="stylesheet" href="{{ asset('/css/admin/app.css')}}"/>
    <script src="https://kit.fontawesome.com/79d95132b9.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;700&display=swap" rel="stylesheet">
</head>
</head>
<body>
    <div id="main">
        <div id="left">
            <div id="logo">
                <img src="{{ URL::to('/images/jobseeker.png') }}"/>
            </div>
            {{-- @if( Auth::user()->role == "1" ) --}}
            <a href="{{ route('admin.index') }}">
                <div id="admin-profile">
                    <img class="admin-avatar" src="/images/avatar.png"/>
                    <h2 class="admin-name">Admin</h2>
                </div>
            </a>
            {{-- @endif
            @if( Auth::user()->role == "2" || Auth::user()->role == "1" ) --}}
            <a href="{{ route('employer.index') }}">
                <div id="users" class="item ">
                    <img class="item-icon" src="/images/employers.png"/>
                    <h2 class="item-title">Employer</h2>
                </div>
            </a>
           {{-- @endif
           @if( Auth::user()->role ==  "3" || Auth::user()->role == "1") --}}
            <a href="#">
                <div id="materials" class="item ">
                    <img class="item-icon" src="/images/users.png"/>
                    <h2 class="item-title">Jobseeker</h2>
                </div>
            </a>
            {{-- @endif
            @if( Auth::user()->role == "2" || Auth::user()->role == "1") --}}
            <a href="{{ route('post.index') }}">
                <div id="classes" class="item ">
                    <img class="item-icon" src="/images/class.png"/>
                    <h2 class="item-title">Post Job</h2>
                </div>
            </a>
            {{-- @endif
            @if( Auth::user()->role == "3" || Auth::user()->role == "1") --}}
            <a href="#">
                <div id="messages" class="item ">
                    <img class="item-icon" src="/images/cv.png"/>
                    <h2 class="item-title">Post CV</h2>
                </div>
            </a>
            {{-- @endif --}}
            <a href="#">
                <div id="messages" class="item ">
                    <span class="fa fa-plus" style="color: #fff; margin-left:15%; margin-top:5%"></span>
                    <h2 class="item-title">Add Category</h2>
                </div>
            </a>
            <a href="#">
                <div id="messages" class="item ">
                    {{-- <img class="item-icon" src="/images/locat.png"/> --}}
                    <span class="fa fa-plus" style="color: #fff; margin-left:15%; margin-top:5%"></span>
                    <h2 class="item-title">Add Location</h2>
                </div>
            </a>

        </div>
        <div id="right">
            <div id="topbar">
                <img id="dotdotdot" src="/images/dotdotdot.png">
            </div>
            <main class="py-4">
            @yield('content')

</body>
</html>

