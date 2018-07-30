<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--<title>{{ config('app.name', 'laravel') }}</title>-->
       <title>@yield('title')</title> 
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-glyphicon.css')}}">
    <link href="{{ asset('my/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    

    <script src="{{asset('my/includes/js/modernizr-2.6.2.min.js')}}"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" style="margin-top: 0px" href="{{ url('/') }}"><img id="logo" width="50" height="50" src="/images/logo.jpg">
                       <!-- {{ config('app.name', 'laravel') }}-->
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav ">
                    <li class="active">
                        <a href="#"><span class="" ></span> Home</a>
                    </li>
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
            
                        <li  class=""><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                        <li  class=""><a href="{{ route('staff.dashboard') }}">Staff</a></li>
                        <li class=""><a href="{{url('/projects')}}">Projects</a></li>
                        <li class=""><a href="#">About US</a></li>
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    <div class="container">
        @yield('content')
    </div><!--container div-->

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('my/includes/js/jquery-1.8.2.min.js')}}"></script>
    <script src="{{ asset('my/includes/js/modernizr-2.6.2.min.js')}}"></script>
    <script src="{{ asset('dist/js/bootstrap.min.js')}}"></script>
</body>
</html>
