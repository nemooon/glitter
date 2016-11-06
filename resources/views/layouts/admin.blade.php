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
                    <div class="clearfix">
                        <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(Auth::guard('member')->user()->email)) }}?s=32" class="rounded float-xs-left" style="margin-right: 0.5rem;">
                        {{ Auth::guard('member')->user()->name }}<br>
                        <small>{{ Auth::guard('member')->user()->activeStoreRole->name }}</small>
                    </div>
                </h4>
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="#">Security</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Switch to $store->name</a>
                <a class="dropdown-item" href="#">Switch to $store->name</a>
                <a class="dropdown-item" href="#">Switch to $store->name</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#logout">Logout</a>
            </div>
        </li>
    </ul>
</nav>{{-- /.header-nav --}}

<nav id="drawer" class="drawer-nav">
    <div class="dropdown">
        <a href="#" class="store-menu dropdown-toggle hidden-sm-down" data-toggle="dropdown">
            <strong>{{ Auth::guard('member')->user()->activeStore->name }}</strong><br>
            <small>{{ Auth::guard('member')->user()->name }}</small>
        </a>
        <div class="dropdown-menu">
            <h4 class="dropdown-header">
                <div class="clearfix">
                    <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(Auth::guard('member')->user()->email)) }}?s=32" class="rounded float-xs-left" style="margin-right: 0.5rem;">
                    {{ Auth::guard('member')->user()->name }}<br>
                    <small>{{ Auth::guard('member')->user()->activeStoreRole->name }}</small>
                </div>
            </h4>
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Security</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Switch to $store->name</a>
            <a class="dropdown-item" href="#">Switch to $store->name</a>
            <a class="dropdown-item" href="#">Switch to $store->name</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#logout">Logout</a>
        </div>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link{{ Request::is('admin') ? ' active' : '' }}" href="{{ route('glitter.admin.index') }}">ホーム</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ Request::is('admin/orders*') ? ' active' : '' }}" href="{{ route('glitter.admin.orders.index') }}">受注管理<i class="nofity fa fa-circle"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ Request::is('admin/products*') ? ' active' : '' }}" href="{{ route('glitter.admin.products.index') }}">商品管理</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ Request::is('admin/customers*') ? ' active' : '' }}" href="{{ route('glitter.admin.customers.index') }}">顧客管理</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">売上分析</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">値引管理</a>
        </li>
    </ul>
    {{-- <hr> --}}
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#">オンラインストア</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Syn Cart</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">WordPress</a>
        </li>
    </ul>
    {{-- <hr> --}}
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#">ストア設定</a>
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
