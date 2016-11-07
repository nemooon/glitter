@extends('glitter::layouts.admin-account')

@section('title', 'Admin')

@section('content')
<header class="header">
    <a class="header-title float-md-left" href="{{ route('glitter.admin.account.profile') }}"><i class="fa fa-user-circle-o fa-fw" aria-hidden="true"></i> プロフィール</a>
</header>

<div class="content">
    <div class="card">
        <div class="card-header">
            プロフィール
        </div>
        <div class="card-block">
            <div class="form-group">
                <label for="profileName">氏名</label>
                <input type="text" class="form-control" id="profileName" name="name" value="{{ old('name', $me->name) }}">
            </div>
            <div class="form-group">
                <label for="profileEmail">メールアドレス</label>
                <input type="email" class="form-control" id="profileEmail" name="email" value="{{ old('email', $me->email) }}">
            </div>
            <button type="submit" class="btn btn-primary">プロフィール変更</button>
        </div>
    </div>
</div>
@endsection
