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

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form role="form" method="POST" action="{{ url('/admin/password/email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label for="email">E-Mail Address</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary btn-block">
                        Send Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
