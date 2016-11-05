@extends('glitter::layouts.shop')

@section('title', 'Reset Password')

@section('content')
<section class="my-3 py-3">
    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-md-8">

                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title text-xs-center">{{ config('app.name', 'Laravel') }}</h4>
                        <p class="card-text text-xs-center mb-2">Reset Password</p>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/password/email') }}">
                            {{ csrf_field() }}

                            <div class="form-group row{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label for="email" class="col-md-4 col-form-label form-control-label text-xs-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-md-4 col-md-8">
                                    <button type="submit" class="btn btn-primary">
                                        Send Password Reset Link
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
