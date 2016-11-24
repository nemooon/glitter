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
    <div class="row mb-2">
        <div class="col-lg-3">
            <div class="pt-2">
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
    <div class="row mb-2">
        <div class="col-lg-3">
            <div class="pt-2">
                <h5>受注設定</h5>
                <p>なんとかかんとかでこれをそうします。</p>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="area">
                <div class="form-group">
                    <label for="orderNumberFormat">受注番号フォーマット</label>
                    <input type="text" class="form-control" id="orderNumberFormat" name="name" value="{{ old('name', '#0000') }}" aria-describedby="orderNumberFormatHelp">
                    <p id="orderNumberFormatHelp" class="form-text text-muted">
                        サンプル: <em>#0001</em>, <em>#0012</em>, <em>#0123</em>, <em>#1234</em>, <em>#12345</em>
                    </p>
                </div>
                <button type="submit" class="btn btn-primary">受注設定を保存する</button>
            </div>
        </div>
    </div>
</div>
@endsection
