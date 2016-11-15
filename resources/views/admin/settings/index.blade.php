@extends('glitter::admin.layouts.admin')

@section('title', 'ストア設定')

@section('header')
<h1 class="title">
    <a href="{{ route('glitter.admin.settings.index') }}"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>ストア設定</a>
</h1>
@endsection

@section('nav')
@include('glitter::admin.settings.nav')
@stop

@section('content')
<div class="container ml-0">
    <div class="row">
        <div class="col-lg-3">
            <div class="py-2">
                <h5>基本設定</h5>
                <p>なんとかかんとかでこれをそうします。</p>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="area">
                <div class="form-group">
                    <label for="storeName">ストア名</label>
                    <input type="text" class="form-control" id="storeName" name="name" value="{{ old('name', $store->name) }}">
                </div>
                <div class="form-group">
                    <label for="storeSlug">スラッグ</label>
                    <input type="text" class="form-control" id="storeSlug" name="slug" value="{{ old('slug', $store->slug) }}">
                </div>
                <button type="submit" class="btn btn-primary">基本設定を保存する</button>
            </div>
        </div>
    </div>
    <hr class="my-2">
    <div class="row">
        <div class="col-lg-3">
            <div class="py-2">
                <h5>設定</h5>
                <p>なんとかかんとかでこれをそうします。</p>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="area">
                <div class="form-group">
                    <label for="profileName">氏名</label>
                    <input type="text" class="form-control" id="profileName" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="profileEmail">メールアドレス</label>
                    <input type="email" class="form-control" id="profileEmail" name="email" value="{{ old('email') }}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
