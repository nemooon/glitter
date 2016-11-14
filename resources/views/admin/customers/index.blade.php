@extends('glitter::admin.layouts.admin')

@section('title', '顧客リスト')

@section('header')
<h1 class="title">
    <a href="{{ route('glitter.admin.customers.index') }}"><i class="fa fa-users fa-fw" aria-hidden="true"></i>顧客リスト</a>
</h1>
@endsection

@section('content')
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
                <a class="nav-link" href="#">リピート客</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">見込み客</a>
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
                        <th class="text-xs-center">受注回数</th>
                        <th class="text-xs-center">最後の受注</th>
                        <th class="text-xs-right">総支出</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="chk"><input type="checkbox"></td>
                        <td><a href="#">根本 啓介</a></td>
                        <td>東京都</td>
                        <td class="text-xs-center">1</td>
                        <td class="text-xs-center"><a href="#">#1001</a></td>
                        <td class="text-xs-right">&yen; {{ number_format(1000000) }}</td>
                    </tr>
                    <tr>
                        <td class="chk"><input type="checkbox"></td>
                        <td><a href="#">根本 啓介</a></td>
                        <td>東京都</td>
                        <td class="text-xs-center">0</td>
                        <td class="text-xs-center">-</td>
                        <td class="text-xs-right">&yen; {{ number_format(1000000) }}</td>
                    </tr>
                    <tr>
                        <td class="chk"><input type="checkbox"></td>
                        <td><a href="#">根本 啓介</a></td>
                        <td>東京都</td>
                        <td class="text-xs-center">0</td>
                        <td class="text-xs-center">-</td>
                        <td class="text-xs-right">&yen; {{ number_format(1000000) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
