@extends('glitter::layouts.admin-guest')

@section('title', 'Login')

@push('styles')
<link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">
@endpush

@section('content')
<div class="guest-content">
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <h1 class="text-xs-center" style="font-family: 'Allura', cursive;">{{ config('admin.name', 'Glitter Admin') }}</h1>
            <p class="text-xs-center mb-2">Login</p>

            <form role="form" method="POST" action="{{ url('/admin/login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required autofocus>

                    @if ($errors->has('email'))
                        <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                    @if ($errors->has('password'))
                        <div class="form-control-feedback">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Remember Me</span>
                    </label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                        Login
                    </button>

                    <a class="btn btn-link btn-block" href="{{ url('/admin/password/reset') }}">
                        Forgot Your Password?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
