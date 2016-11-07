@extends('glitter::layouts.admin')

@section('title', 'Admin')

@section('content')
<header class="header">
    <a class="header-title float-md-left" href="{{ route('glitter.admin.orders.index') }}">受注管理</a>
    <nav class="nav nav-inline float-md-left">
        <a class="nav-link active" href="{{ route('glitter.admin.orders.index') }}">受注</a>
        <a class="nav-link" href="{{ route('glitter.admin.orders.index') }}">下書き</a>
        <a class="nav-link" href="{{ route('glitter.admin.orders.index') }}">返品</a>
    </nav>
</header>

<nav class="action-nav">
    <div class="btn-toolbar float-xs-right" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group" role="group" aria-label="First group">
            <button type="button" class="btn btn-secondary">インポート</button>
            <button type="button" class="btn btn-secondary">エクスポート</button>
        </div>
        <div class="btn-group" role="group" aria-label="Third group">
            <button type="button" class="btn btn-primary">新規受注</button>
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
                    <a class="nav-link" href="#">オープン</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">未発送</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">未払い</a>
                </li>
            </ul>
        </div>
        <div class="card-block">
            <div class="form-group">
                <input type="search" class="form-control" placeholder="Filter">
            </div>
            <div class="table-responsive">
                <table class="table table-data mb-0">
                    <thead>
                        <tr>
                            <th class="chk"><input type="checkbox"></th>
                            <th>受注</th>
                            <th>日付</th>
                            <th>顧客</th>
                            <th>支払ステータス</th>
                            <th>発送ステータス</th>
                            <th>代金</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="chk"><input type="checkbox"></td>
                            <td><a href="#">#1001</a></td>
                            <td>2分前</td>
                            <td>根本 啓介</td>
                            <td><span class="status status-paid">支払い済み</span></td>
                            <td><span class="status status-unfulfilled">未発送</span></td>
                            <td class="text-xs-right">&yen; 3,624</td>
                        </tr>
                        <tr>
                            <td class="chk"><input type="checkbox"></td>
                            <td><a href="#">#1001</a></td>
                            <td>2分前</td>
                            <td>根本 啓介</td>
                            <td><span class="status status-paid">支払い済み</span></td>
                            <td><span class="status status-fulfilled">発送済み</span></td>
                            <td class="text-xs-right">&yen; 3,624</td>
                        </tr>
                        <tr>
                            <td class="chk"><input type="checkbox"></td>
                            <td><a href="#">#1001</a></td>
                            <td>2分前</td>
                            <td>根本 啓介</td>
                            <td><span class="status status-paid">支払い済み</span></td>
                            <td><span class="status status-fulfilled">発送済み</span></td>
                            <td class="text-xs-right">&yen; 3,624</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
