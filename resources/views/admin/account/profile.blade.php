@extends('glitter::admin.layouts.admin-account')

@section('title', 'プロフィール')

@section('content')
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
@endsection
