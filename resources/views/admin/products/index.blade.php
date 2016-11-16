@extends('glitter::admin.layouts.admin')

@section('title', '商品管理')

@section('header')
<h1 class="title">
    <a href="{{ route('glitter.admin.products.index') }}"><i class="fa fa-tag fa-fw" aria-hidden="true"></i>商品管理</a>
</h1>
@endsection

@section('nav')
<ul class="nav">
    <li class="nav-item"><a class="nav-link{{ Request::is('admin/products') ? ' active' : '' }}" href="{{ route('glitter.admin.products.index') }}">商品</a></li>
    <li class="nav-item"><a class="nav-link disabled{{ Request::is('admin/products/transfers') ? ' active' : '' }}" href="{{ route('glitter.admin.products.index') }}">入荷</a></li>
    <li class="nav-item"><a class="nav-link disabled{{ Request::is('admin/products/inventory') ? ' active' : '' }}" href="{{ route('glitter.admin.products.index') }}">在庫</a></li>
    <li class="nav-item"><a class="nav-link disabled{{ Request::is('admin/products/collections') ? ' active' : '' }}" href="{{ route('glitter.admin.products.index') }}">コレクション</a></li>
</ul>
@stop

@section('content')
<nav class="action-nav">
    <div class="btn-toolbar float-xs-right" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group" role="group" aria-label="First group">
            <button type="button" class="btn btn-secondary">インポート</button>
            <button type="button" class="btn btn-secondary">エクスポート</button>
        </div>
        <div class="btn-group" role="group" aria-label="Third group">
            <button type="button" class="btn btn-primary">新規商品</button>
        </div>
    </div>
</nav>

<div class="list-card card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs float-xs-left">
            <li class="nav-item">
                <a class="nav-link active" href="#">すべて</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">タブを追加</a>
            </li>
        </ul>
    </div>
    <div class="card-block">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        フィルター
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </div>
                <input type="search" class="form-control" placeholder="キーワード検索">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-data mb-0">
                <thead>
                    <tr>
                        <th class="chk"><input type="checkbox"></th>
                        <th class="media"></th>
                        <th>名称</th>
                        <th>在庫</th>
                        <th>タイプ</th>
                        <th>ベンダ</th>
                    </tr>
                </thead>
                <tbody>
@foreach($products as $product)
                    <tr>
                        <td class="chk"><input type="checkbox"></td>
                        <td class="media"><img src="{{ $product->thumbnail() ?: 'http://placehold.jp/50x50.png?text=thumb' }}" width="50" height="50" class="rounded"></td>
                        <td class="name"><a href="#">{{ $product->name }}</a></td>
                        <td>0</td>
                        <td>T-Shirt</td>
                        <td>ONLAB</td>
                    </tr>
@endforeach
{{--
                    <tr>
                        <td class="chk"><input type="checkbox"></td>
                        <td class="media"><img src="http://placehold.jp/50x50.png" class="rounded"></td>
                        <td class="name"><a href="#">Highday Tee</a></td>
                        <td>10</td>
                        <td>T-Shirt</td>
                        <td>ONLAB</td>
                    </tr>
                    <tr>
                        <td class="chk"><input type="checkbox"></td>
                        <td class="media"><img src="http://placehold.jp/50x50.png" class="rounded"></td>
                        <td class="name"><a href="#">My Product</a><br><small class="text-muted">Any description</small></td>
                        <td><span class="text-muted">N/A</span></td>
                        <td>-</td>
                        <td>My Store</td>
                    </tr>
--}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
