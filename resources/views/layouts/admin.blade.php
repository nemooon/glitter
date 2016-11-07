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
        <i class="fa fa-bars" aria-hidden="true"></i>
        {{ Auth::guard('member')->user()->activeStore->name }}
    </a>
    <ul class="nav navbar-nav float-xs-right">
        <li class="nav-item">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::guard('member')->user()->name }}</a>
            <div class="dropdown-menu dropdown-menu-right">
                <h4 class="dropdown-header">
                    <div class="user-banner clearfix">
                        <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(Auth::guard('member')->user()->email)) }}?s=32" class="rounded float-xs-left" style="margin-right: 0.5rem;">
                        <div class="user-name">{{ Auth::guard('member')->user()->name }}</div>
                        <div class="user-role">{{ Auth::guard('member')->user()->activeStoreRole->name }}</div>
                    </div>
                </h4>
                <a class="dropdown-item disabled" href="#">プロフィール</a>
                <a class="dropdown-item disabled" href="#">環境設定</a>
                <a class="dropdown-item disabled" href="#">セキュリティ</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item disabled" href="#">$store->name へ切り替える</a>
                <a class="dropdown-item disabled" href="#">Switch to $store->name</a>
                <a class="dropdown-item disabled" href="#">Switch to $store->name</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#logout">ログアウト</a>
            </div>
        </li>
    </ul>
</nav>{{-- /.header-nav --}}

<nav id="drawer" class="drawer-nav">
    <div class="dropdown">
        <a href="#" class="store-menu hidden-sm-down" data-toggle="dropdown">
            <i class="fa fa-angle-down float-xs-right mt-2" aria-hidden="true"></i>
            <strong>{{ Auth::guard('member')->user()->activeStore->name }}</strong><br>
            <small>{{ Auth::guard('member')->user()->name }}</small>
        </a>
        <div class="dropdown-menu">
            <h4 class="dropdown-header">
                <div class="user-banner clearfix">
                    <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(Auth::guard('member')->user()->email)) }}?s=32" class="rounded float-xs-left" style="margin-right: 0.5rem;">
                    <div class="user-name">{{ Auth::guard('member')->user()->name }}</div>
                    <div class="user-role">{{ Auth::guard('member')->user()->activeStoreRole->name }}</div>
                </div>
            </h4>
            <a class="dropdown-item disabled" href="#">プロフィール</a>
            <a class="dropdown-item disabled" href="#">環境設定</a>
            <a class="dropdown-item disabled" href="#">セキュリティ</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item disabled" href="#">$store->name へ切り替える</a>
            <a class="dropdown-item disabled" href="#">Switch to $store->name</a>
            <a class="dropdown-item disabled" href="#">Switch to $store->name</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#logout">ログアウト</a>
        </div>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link{{ Request::is('admin') ? ' active' : '' }}" href="{{ route('glitter.admin.index') }}"><i class="fa fa-home fa-fw" aria-hidden="true"></i> ホーム</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ Request::is('admin/orders*') ? ' active' : '' }}" href="{{ route('glitter.admin.orders.index') }}"><i class="fa fa-inbox fa-fw" aria-hidden="true"></i> 受注管理<i class="nofity fa fa-circle"></i></a>
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
    {{-- <hr> --}}
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
    {{-- <hr> --}}
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link disabled" href="#"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> ストア設定</a>
        </li>
    </ul>
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
