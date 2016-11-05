@extends('glitter::layouts.admin')

@section('title', 'Admin')

@section('content')
<header class="header">
    <div class="header-title float-xs-left">商品管理</div>
    <div class="btn-toolbar float-xs-right" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group">
        <button type="button" class="btn btn-secondary">エクスポート</button>
        <button type="button" class="btn btn-secondary">インポート</button>
      </div>
      <div class="btn-group">
        <button type="button" class="btn btn-primary">商品登録</button>
      </div>
    </div>
</header>

<div class="p-1">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs float-xs-left">
                <li class="nav-item">
                    <a class="nav-link active" href="#">すべて</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">+</a>
                </li>
            </ul>
        </div>
        <div class="card-block">
            <div class="mb-1">
            <div class="form-group">
                <input type="search" class="form-control" placeholder="Filter">
            </div>
            </div>
            <table class="table table-hover small mb-0">
                <thead>
                    <tr>
                        <th><input type="checkbox"></th>
                        <th></th>
                        <th>Product</th>
                        <th>Inventory</th>
                        <th>Type</th>
                        <th>Vendor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td><img src="http://placehold.jp/50x50.png"></td>
                        <td>T-Shirt</td>
                        <td>10 in stock</td>
                        <td>-</td>
                        <td>Store</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td><img src="http://placehold.jp/50x50.png"></td>
                        <td>T-Shirt</td>
                        <td>10 in stock</td>
                        <td>-</td>
                        <td>Store</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td><img src="http://placehold.jp/50x50.png"></td>
                        <td>T-Shirt</td>
                        <td>10 in stock</td>
                        <td>-</td>
                        <td>Store</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td><img src="http://placehold.jp/50x50.png"></td>
                        <td>T-Shirt</td>
                        <td>10 in stock</td>
                        <td>-</td>
                        <td>Store</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td><img src="http://placehold.jp/50x50.png"></td>
                        <td>T-Shirt</td>
                        <td>10 in stock</td>
                        <td>-</td>
                        <td>Store</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td><img src="http://placehold.jp/50x50.png"></td>
                        <td>T-Shirt</td>
                        <td>10 in stock</td>
                        <td>-</td>
                        <td>Store</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td><img src="http://placehold.jp/50x50.png"></td>
                        <td>T-Shirt</td>
                        <td>10 in stock</td>
                        <td>-</td>
                        <td>Store</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td><img src="http://placehold.jp/50x50.png"></td>
                        <td>T-Shirt</td>
                        <td>10 in stock</td>
                        <td>-</td>
                        <td>Store</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td><img src="http://placehold.jp/50x50.png"></td>
                        <td>T-Shirt</td>
                        <td>10 in stock</td>
                        <td>-</td>
                        <td>Store</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td><img src="http://placehold.jp/50x50.png"></td>
                        <td>T-Shirt</td>
                        <td>10 in stock</td>
                        <td>-</td>
                        <td>Store</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td><img src="http://placehold.jp/50x50.png"></td>
                        <td>T-Shirt</td>
                        <td>10 in stock</td>
                        <td>-</td>
                        <td>Store</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td><img src="http://placehold.jp/50x50.png"></td>
                        <td>T-Shirt</td>
                        <td>10 in stock</td>
                        <td>-</td>
                        <td>Store</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td><img src="http://placehold.jp/50x50.png"></td>
                        <td>T-Shirt</td>
                        <td>10 in stock</td>
                        <td>-</td>
                        <td>Store</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
