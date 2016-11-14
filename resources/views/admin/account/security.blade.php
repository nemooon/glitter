@extends('glitter::admin.layouts.admin-account')

@section('title', 'セキュリティ')

@section('content')
<div class="card">
    <div class="card-header">
        パスワード変更
    </div>
    <div class="card-block">
        <div class="form-group">
            <label for="profileOldPassword">現在のパスワード</label>
            <input type="password" class="form-control" id="profileOldPassword" name="old_password" value="{{ old('old_password') }}">
        </div>
        <div class="form-group">
            <label for="profileNewPassword">新しいパスワード</label>
            <input type="password" class="form-control" id="profileNewPassword" name="new_password" value="{{ old('new_password') }}">
        </div>
        <div class="form-group">
            <label for="profileConfirmNewPassword">新しいパスワード（確認）</label>
            <input type="password" class="form-control" id="profileConfirmNewPassword" name="confirm_new_password" value="{{ old('confirm_password') }}">
        </div>
        <button type="submit" class="btn btn-primary">パスワード変更</button>
        <a href="{{ url('/admin/password/reset') }}" class="btn btn-link">パスワードを忘れた</a>
    </div>
</div>
@endsection
