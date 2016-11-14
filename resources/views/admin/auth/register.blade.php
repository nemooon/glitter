@extends('glitter::admin.layouts.admin-guest')

@section('title', 'Register')

@push('styles')
<link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">
@endpush

@section('content')
<div class="guest-content">
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <h1 class="text-xs-center" style="font-family: 'Allura', cursive;">{{ config('admin.name', 'Glitter Admin') }}</h1>
            <p class="text-xs-center mb-2">Register</p>

            <form role="form" method="POST" action="{{ url('/admin/register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <div class="form-control-feedback">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">E-Mail Address</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <div class="form-control-feedback">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <div class="mt-2">
                    <button type="submit" class="btn btn-primary btn-block">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
