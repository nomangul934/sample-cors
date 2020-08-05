<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Plugins -->
    <link href="{{asset('plugins/jquery-growl/jquery.growl.css')}}" rel="stylesheet" type="text/css" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{--<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700&display=swap" rel="stylesheet">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css?version=1.0') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-style.css?version=1.0') }}" rel="stylesheet">
    <link href="{{ asset('lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    @yield('vendor-css')

    <link rel="icon" href="{{asset('public/favicon.ico')}}">
</head>
<body >
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #2bb0b8;">

        <div class="container">

            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="img-responsive" width="160"  src="{{ asset('images/logo-option-2.png') }}" />
            </a>
            <div class="manuNav">
                <ul class="navbar-nav mr-auto">
                </ul>

                <ul class="navbar-nav ml-auto">

                    <!-- Authentication Links -->

                    @guest



                    @else

                        <li class="nav-item dropdown headerUserInfo">

                            <div class="logoutText">

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                    <span class="textdropNav">{{ __('Logout') }}</span>

                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>


</div>

</body>

<script src="{{ asset('lib/jquery/jquery.js') }}"></script>
@yield('head')
<script src="{{ asset('lib/popper.js/popper.js') }}"></script>
<script src="{{ asset('lib/bootstrap/bootstrap.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/login.js') }}"></script>

<script src="{{ asset('lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>

@yield('vendor-js')

<script src="{{ asset('js/starlight.js') }}"></script>

@yield('custom-js')
<script src="{{ asset('js/submit.js') }}"></script>

</html>
