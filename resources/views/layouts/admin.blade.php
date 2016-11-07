<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@yield('title') - {{ config('admin.name', 'Glitter Admin') }}</title>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/admin.css') }}" media="all" />
@stack('styles')
<script>
window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
]); ?>
</script>
</head>
<body>

<div id="glitter-admin" class="admin-screen">

<nav class="header-nav navbar navbar-fixed-top navbar-dark hidden-md-up">
    <a data-toggle="drawer" href="#" class="navbar-brand">
        <i class="fa fa-bars fa-fw" aria-hidden="true"></i>
        {{ Auth::guard('member')->user()->activeStore->name }}
    </a>
    <ul class="nav navbar-nav float-xs-right">
        <li class="nav-item">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::guard('member')->user()->name }}</a>
            <div class="dropdown-menu dropdown-menu-right">
                <h4 class="dropdown-header">
                    <div class="user-banner clearfix">
                        <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(Auth::guard('member')->user()->email)) }}?s=64" class="rounded float-xs-left" style="width: 32px; margin-right: 0.5rem;">
                        <div class="user-name">{{ Auth::guard('member')->user()->name }}</div>
                        <div class="user-role">{{ Auth::guard('member')->user()->activeStoreRole->name }}</div>
                    </div>
                </h4>
                <a class="dropdown-item" href="{{ route('glitter.admin.account.profile') }}">プロフィール</a>
                <a class="dropdown-item" href="{{ route('glitter.admin.account.security') }}">セキュリティ</a>
                <div class="dropdown-divider"></div>
@if(!Auth::guard('member')->user()->switchable_stores->isEmpty())
                <h6 class="dropdown-header">ストアの切り替え</h6>
@foreach(Auth::guard('member')->user()->switchable_stores as $store)
                <a class="dropdown-item" href="{{ route('glitter.admin.store_switch', $store) }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>{{ $store->name }}</a>
@endforeach
                <div class="dropdown-divider"></div>
@endif
                <a class="dropdown-item" href="#logout">ログアウト</a>
            </div>
        </li>
    </ul>
</nav>{{-- /.header-nav --}}

<nav id="drawer" class="drawer-nav">
    <div class="drawer-nav-store dropdown">
        <a href="#" class="store-menu hidden-sm-down" data-toggle="dropdown">
            <i class="fa fa-caret-down fa-fw float-xs-right" aria-hidden="true"></i>
            <strong>{{ Auth::guard('member')->user()->activeStore->name }}</strong><br>
            <small><i class="fa fa-user-circle-o fa-fw" aria-hidden="true"></i> {{ Auth::guard('member')->user()->name }}</small>
        </a>
        <div class="dropdown-menu">
            <h4 class="dropdown-header">
                <div class="user-banner clearfix">
                    <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(Auth::guard('member')->user()->email)) }}?s=64" class="rounded float-xs-left" style="width: 32px; margin-right: 0.5rem;">
                    <div class="user-name">{{ Auth::guard('member')->user()->name }}</div>
                    <div class="user-role">{{ Auth::guard('member')->user()->activeStoreRole->name }}</div>
                </div>
            </h4>
            <a class="dropdown-item" href="{{ route('glitter.admin.account.profile') }}">プロフィール</a>
            <a class="dropdown-item" href="{{ route('glitter.admin.account.security') }}">セキュリティ</a>
            <div class="dropdown-divider"></div>
@if(!Auth::guard('member')->user()->switchable_stores->isEmpty())
            <h6 class="dropdown-header">ストアの切り替え</h6>
@foreach(Auth::guard('member')->user()->switchable_stores as $store)
            <a class="dropdown-item" href="{{ route('glitter.admin.store_switch', $store) }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> {{ $store->name }}</a>
@endforeach
            <div class="dropdown-divider"></div>
@endif
            <a class="dropdown-item" href="#logout">ログアウト</a>
        </div>
    </div>
    <div class="drawer-nav-content">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link{{ Request::is('admin') ? ' active' : '' }}" href="{{ route('glitter.admin.index') }}"><i class="fa fa-home fa-fw" aria-hidden="true"></i> ホーム</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ Request::is('admin/orders*') ? ' active' : '' }}" href="{{ route('glitter.admin.orders.index') }}"><i class="fa fa-inbox fa-fw" aria-hidden="true"></i> 受注管理<i class="nofity fa fa-circle fa-fw"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ Request::is('admin/products*') ? ' active' : '' }}" href="{{ route('glitter.admin.products.index') }}"><i class="fa fa-tag fa-fw" aria-hidden="true"></i> 商品管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ Request::is('admin/customers*') ? ' active' : '' }}" href="{{ route('glitter.admin.customers.index') }}"><i class="fa fa-users fa-fw" aria-hidden="true"></i> 顧客管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#"><i class="fa fa-bar-chart fa-fw" aria-hidden="true"></i> 売上分析</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#"><i class="fa fa-scissors fa-fw" aria-hidden="true"></i> 値引管理</a>
            </li>
        </ul>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link disabled" href="#"><i class="fa fa-globe fa-fw" aria-hidden="true"></i> オンラインストア</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i> Syn Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#"><i class="fa fa-wordpress fa-fw" aria-hidden="true"></i> WordPress</a>
            </li>
        </ul>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link disabled" href="#"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> ストア設定</a>
            </li>
        </ul>
    </div>
</nav>{{-- /.drawer-nav --}}

@section('main')
<main class="main-section">
@yield('content')
</main>{{-- /.main-section --}}
@show

</div>{{-- /.admin-screen --}}
{{-- Logout Form --}}
@if(Auth::guard('member')->check())
<form id="logoutForm" role="form" method="POST" action="{{ url('/admin/logout') }}">{{ csrf_field() }}</form>
@endif
{{-- Scripts --}}
<script src="{{ asset('/js/admin.js') }}"></script>
@yield('scripts')

</body>
</html>
