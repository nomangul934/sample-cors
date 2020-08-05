@extends('layouts.login_register')

@section('content')
    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="tx-center mg-b-20"><a href=""><img src="/images/logo-option-2.png" alt="udros" width="180"></a></div>
        <div class="signin-logo tx-center tx-20 tx-bold tx-inverse wd-250 mg-b-20" style="margin:20px auto;">{{ config('app.name', 'Laravel') }}</div>

        <form class="form-prevent-multiple-submits" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}"
                       required autocomplete="email" autofocus
                       placeholder="{{ __('E-Mail Address') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- form-group -->
            <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password"
                        placeholder="{{ __('Password') }}">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
            <!-- form-group -->
            <div class="form-group">
                <label class="ckbox">
                    <input type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                    <span>{{ __('Remember Me') }}</span>
                </label>
            </div>
            <!-- form-group -->
            <button type="submit" class="btn btn-info btn-block button-prevent-multiple-submits">{{ __('Login') }}</button>
            <!-- form-group -->
            <div class="mg-t-40 tx-center">Register a school ?
                @if (Route::has('register'))
                    <a class="tx-info" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            </div>
            <div class="mg-t-20 tx-center">Register a university ?
                @if (Route::has('register_university'))
                    <a class="tx-info" href="{{ route('register_university') }}">{{ __('Register') }}</a>
                @endif
            </div>
            <div class="mg-t-20 tx-center">Register a Student ?
                @if (Route::has('register_students'))
                    <a class="tx-info" href="{{ route('register_students') }}">{{ __('Register') }}</a>
                @endif
            </div>
        </form>
    </div>
    <!-- login-wrapper -->
@endsection
