@extends('layouts.login_register')

@section('head')
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
@endsection

@section('content')
<div class="login-wrapper wd-300 wd-xs-400 pd-25 bg-white" style="max-height: 90%; overflow-y: scroll">
    <div class="tx-center mg-b-20"><a href=""><img src="/images/logo-option-2.png" alt="udros" width="180"></a></div>
    <div class="tx-center mg-b-20">
      <h2>Register a School</h2></div>
    <div class="signin-logo tx-center tx-20 tx-bold tx-inverse wd-250 mg-b-20" style="margin:20px auto;">{{ config('app.name', 'Laravel') }}</div>

    <form class="form-prevent-multiple-submits recapcha-form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter School's Contact Name">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <!-- form-group -->
        <div class="form-group">
            <input id="school_name" type="text" class="form-control @error('school_name') is-invalid @enderror" name="school_name" value="{{ old('school_name') }}" required autocomplete="school_name" autofocus placeholder="Enter School Name">
            @error('school_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Enter Mobile Number">
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <!-- form-group -->
        <!-- form-group -->
        <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <!-- form-group -->
        <div class="form-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter your password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <!-- form-group -->
        <div class="form-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password confirmation">
        </div>
        <!-- form-group -->

        <div class="form-group row">
            <div class="col-md-12">
                <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}"></div>
                <span class="invalid-feedback recaptch-error-message" style="display: none; color: red;">
                    <strong>Please Select Recaptcha!</strong>
                </span>
            </div>
        </div>

        <button type="submit" class="btn btn-info btn-block button-prevent-multiple-submits">
            {{ __('Register a School') }}
        </button>
    </form>
    <div class="mg-t-40 tx-center">Already have an account? <a href="{{ route('login') }}" class="tx-info">{{ __('Login') }}</a></div>
</div><!-- login-wrapper -->
@endsection