@extends('glitter::layouts.admin-guest')

@section('title', 'Reset Password')

@push('styles')
<link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">
@endpush

@section('content')
<div class="guest-content">
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <h1 class="text-xs-center" style="font-family: 'Allura', cursive;">{{ config('admin.name', 'Glitter Admin') }}</h1>
            <p class="text-xs-center mb-2">Reset Password</p>

            <form role="form" method="POST" action="{{ url('/admin/password/reset') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label for="email">E-Mail Address</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <div class="form-control-feedback">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                    @if ($errors->has('password_confirmation'))
                        <div class="form-control-feedback">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                </div>

                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary btn-block">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
