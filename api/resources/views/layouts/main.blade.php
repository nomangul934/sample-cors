<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- vendor css -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">


@yield('vendor-css')

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('css/starlight.css') }}">
    <style>
        .table-wrapper {
          overflow-x: scroll;
        }
    </style>
</head>

<body>

<!-- ########## START: LEFT PANEL ########## -->
<div class="sl-logo">
    <a href=""><!--<i class="icon ion-university"></i> Udros</a>-->
        <img src="/images/logo-option-2.png" alt="udros" width="120">
    </a>
</div>
<div class="sl-sideleft">
    @yield('left-menu')
</div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<div class="sl-header">
    <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
    </div><!-- sl-header-left -->
    <div class="sl-header-right">
        <nav class="nav">
            @if(Auth::user())
            <div class="dropdown">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    @if(Auth::user()->role === 'school')
                    <span class="logged-name">{{ $school->name }}</span>
                    @elseif(Auth::user()->role === 'university')
                    <span class="logged-name">{{ $university->name }}</span>
                    @else
                    <span class="logged-name">{{ Auth::user()->name }}</span>
                    @endif
                    @if(Auth::user()->logo)<img src="{{asset('/images/user/'. Auth::user()->logo)}}" class="wd-32 ht-32 rounded-circle" alt="">@endif
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        @if(Auth::user()->role === 'school')
                            <li><a href="{{ route('school.update_profile') }}"><i class="icon ion-ios-home-outline"></i> Edit School Profile</a></li>
                            <li><a href="{{ route('school.user_profile') }}"><i class="icon ion-ios-person-outline"></i> Edit User Profile</a></li>
                        @elseif(Auth::user()->role === 'university')
                            <li><a href="{{ route('university.update_profile') }}"><i class="icon ion-university"></i> Edit University Profile</a></li>
                            <li><a href="{{ route('university.user_profile') }}"><i class="icon ion-ios-person-outline"></i> Edit User Profile</a></li>
                        @endif
                        <li><a href="{{ route('change_password_page') }}"><i class="icon ion-lock-combination"></i>Change Password</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="icon ion-power"></i> {{ __('Logout') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
            @endif
        </nav>
    </div><!-- sl-header-right -->
</div><!-- sl-header -->
<!-- ########## END: HEAD PANEL ########## -->

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">

    @yield('content')

    <footer class="sl-footer">
        <div class="footer-left">
            <div class="mg-b-2">Copyright &copy; 2019. Udros. All Rights Reserved.</div>
        </div>
    </footer>

</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<script src="{{ asset('lib/jquery/jquery.js') }}"></script>


<script src="{{ asset('lib/popper.js/popper.js') }}"></script>
<script src="{{ asset('lib/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>


@yield('vendor-js')

<script src="{{ asset('js/starlight.js') }}"></script>

@yield('custom-js')

</body>
</html>
