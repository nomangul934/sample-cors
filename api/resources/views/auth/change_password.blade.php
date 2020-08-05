@extends('layouts.login_register')

@section('content')
    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="tx-center mg-b-20"><a href=""><img src="/images/logo-option-2.png" alt="udros" width="180"></a></div>
        <div class="signin-logo tx-center tx-20 tx-bold tx-inverse wd-250 mg-b-20" style="margin:20px auto;">{{ config('app.name', 'Laravel') }}</div>

        <form class="form-prevent-multiple-submits" method="POST" action="{{ route('change_password') }}" novalidate>
            @csrf
            <div class="form-group">
                <input id="current-password" type="password" class="form-control @error('current-password') is-invalid @enderror"
                       name="current-password" value="{{ old('current-password') }}"
                       required autocomplete="current-password" autofocus
                       placeholder="Current password">
                @error('current-password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" value="{{ old('password') }}"
                       required autocomplete="password" autofocus
                       placeholder="New password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- form-group -->
            <div class="form-group">
                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control"
                           name="password_confirmation" value="{{ old('password_confirmation') }}"
                           required autocomplete="new-password"
                           placeholder="Password confirmation" >
                </div>
            </div>
            <!-- form-group -->
            <a href="/" class="btn btn-info btn-block">Cancel</a>
            <button type="submit" class="btn btn-info btn-block button-prevent-multiple-submits">Change</button>
            <!-- form-group -->
        </form>
    </div>
    <!-- login-wrapper -->
@endsection
