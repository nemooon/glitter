@extends('glitter::layouts.admin')

@section('title', 'Admin')

@section('content')
<header class="header">
    <div class="header-title float-md-left">顧客管理</div>
    <nav class="nav nav-inline float-md-left">
        <a class="nav-link active" href="#">顧客リスト</a>
    </nav>
</header>

<nav class="action-nav">
    <div class="btn-toolbar float-xs-right" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group" role="group" aria-label="First group">
            <button type="button" class="btn btn-secondary">インポート</button>
            <button type="button" class="btn btn-secondary">エクスポート</button>
        </div>
        <div class="btn-group" role="group" aria-label="Third group">
            <button type="button" class="btn btn-primary">新規顧客</button>
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
                    <a class="nav-link" href="#">メルマガ購読</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">リピーター</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">クレーマー</a>
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
                            <th>氏名</th>
                            <th>所在地</th>
                            <th>受注回数</th>
                            <th>最後の受注</th>
                            <th>総金額</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="chk"><input type="checkbox"></td>
                            <td><a href="#">根本 啓介</a></td>
                            <td>東京都</td>
                            <td>0</td>
                            <td>-</td>
                            <td class="text-xs-right">&yen; {{ number_format(1000000) }}</td>
                        </tr>
                        <tr>
                            <td class="chk"><input type="checkbox"></td>
                            <td><a href="#">根本 啓介</a></td>
                            <td>東京都</td>
                            <td>0</td>
                            <td>-</td>
                            <td class="text-xs-right">&yen; {{ number_format(1000000) }}</td>
                        </tr>
                        <tr>
                            <td class="chk"><input type="checkbox"></td>
                            <td><a href="#">根本 啓介</a></td>
                            <td>東京都</td>
                            <td>0</td>
                            <td>-</td>
                            <td class="text-xs-right">&yen; {{ number_format(1000000) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
