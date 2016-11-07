@extends('glitter::layouts.admin')

@section('title', 'Admin')

@section('content')
<header class="header">
    <div class="header-title float-md-left">商品管理</div>
    <nav class="nav nav-inline float-md-left">
        <a class="nav-link active" href="#">商品</a>
        <a class="nav-link" href="#">入荷</a>
        <a class="nav-link" href="#">在庫</a>
        <a class="nav-link" href="#">コレクション</a>
    </nav>
</header>

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

<div class="content">
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
                            <th>商品名</th>
                            <th>在庫</th>
                            <th>タイプ</th>
                            <th>ベンダ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="chk"><input type="checkbox"></td>
                            <td class="media"><img src="http://placehold.jp/50x50.png" class="rounded"></td>
                            <td class="name"><a href="#">T-Shirt</a><br><small class="text-muted">Category</small></td>
                            <td>10個</td>
                            <td>-</td>
                            <td>My Store</td>
                        </tr>
                        <tr>
                            <td class="chk"><input type="checkbox"></td>
                            <td class="media"><img src="http://placehold.jp/50x50.png" class="rounded"></td>
                            <td class="name"><a href="#">T-Shirt</a><br><small class="text-muted">Category</small></td>
                            <td>10個</td>
                            <td>-</td>
                            <td>My Store</td>
                        </tr>
                        <tr>
                            <td class="chk"><input type="checkbox"></td>
                            <td class="media"><img src="http://placehold.jp/50x50.png" class="rounded"></td>
                            <td class="name"><a href="#">T-Shirt</a><br><small class="text-muted">Category</small></td>
                            <td>10個</td>
                            <td>-</td>
                            <td>My Store</td>
                        </tr>
                        <tr>
                            <td class="chk"><input type="checkbox"></td>
                            <td class="media"><img src="http://placehold.jp/50x50.png" class="rounded"></td>
                            <td class="name"><a href="#">T-Shirt</a><br><small class="text-muted">Category</small></td>
                            <td>10個</td>
                            <td>-</td>
                            <td>My Store</td>
                        </tr>
                        <tr>
                            <td class="chk"><input type="checkbox"></td>
                            <td class="media"><img src="http://placehold.jp/50x50.png" class="rounded"></td>
                            <td class="name"><a href="#">T-Shirt</a><br><small class="text-muted">Category</small></td>
                            <td>10個</td>
                            <td>-</td>
                            <td>My Store</td>
                        </tr>
                        <tr>
                            <td class="chk"><input type="checkbox"></td>
                            <td class="media"><img src="http://placehold.jp/50x50.png" class="rounded"></td>
                            <td class="name"><a href="#">T-Shirt</a><br><small class="text-muted">Category</small></td>
                            <td>10個</td>
                            <td>-</td>
                            <td>My Store</td>
                        </tr>
                        <tr>
                            <td class="chk"><input type="checkbox"></td>
                            <td class="media"><img src="http://placehold.jp/50x50.png" class="rounded"></td>
                            <td class="name"><a href="#">T-Shirt</a><br><small class="text-muted">Category</small></td>
                            <td>10個</td>
                            <td>-</td>
                            <td>My Store</td>
                        </tr>
                        <tr>
                            <td class="chk"><input type="checkbox"></td>
                            <td class="media"><img src="http://placehold.jp/50x50.png" class="rounded"></td>
                            <td class="name"><a href="#">T-Shirt</a><br><small class="text-muted">Category</small></td>
                            <td>10個</td>
                            <td>-</td>
                            <td>My Store</td>
                        </tr>
                        <tr>
                            <td class="chk"><input type="checkbox"></td>
                            <td class="media"><img src="http://placehold.jp/50x50.png" class="rounded"></td>
                            <td class="name"><a href="#">T-Shirt</a><br><small class="text-muted">Category</small></td>
                            <td>10個</td>
                            <td>-</td>
                            <td>My Store</td>
                        </tr>
                        <tr>
                            <td class="chk"><input type="checkbox"></td>
                            <td class="media"><img src="http://placehold.jp/50x50.png" class="rounded"></td>
                            <td class="name"><a href="#">T-Shirt</a><br><small class="text-muted">Category</small></td>
                            <td>10個</td>
                            <td>-</td>
                            <td>My Store</td>
                        </tr>
                        <tr>
                            <td class="chk"><input type="checkbox"></td>
                            <td class="media"><img src="http://placehold.jp/50x50.png" class="rounded"></td>
                            <td class="name"><a href="#">T-Shirt</a><br><small class="text-muted">Category</small></td>
                            <td>10個</td>
                            <td>-</td>
                            <td>My Store</td>
                        </tr>
                        <tr>
                            <td class="chk"><input type="checkbox"></td>
                            <td class="media"><img src="http://placehold.jp/50x50.png" class="rounded"></td>
                            <td class="name"><a href="#">T-Shirt</a><br><small class="text-muted">Category</small></td>
                            <td>10個</td>
                            <td>-</td>
                            <td>My Store</td>
                        </tr>
                        <tr>
                            <td class="chk"><input type="checkbox"></td>
                            <td class="media"><img src="http://placehold.jp/50x50.png" class="rounded"></td>
                            <td class="name"><a href="#">T-Shirt</a><br><small class="text-muted">Category</small></td>
                            <td>10個</td>
                            <td>-</td>
                            <td>My Store</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
