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

<nav class="header-nav navbar navbar-fixed-top navbar-dark">
    <ul class="nav navbar-nav">
        <li class="nav-item">
            <a class="nav-link">ホーム</a>
        </li>
{{--         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Glitter Admin</a>
            <div class="dropdown-menu dropdown-menu-left">
                <h6 class="dropdown-header">Change store</h6>
                <a class="dropdown-item disabled" href="#">@{{ STORENAME }}</a>
                <a class="dropdown-item disabled" href="#">@{{ STORENAME }}</a>
                <a class="dropdown-item disabled" href="#">@{{ STORENAME }}</a>
            </div>
        </li> --}}
    </ul>
@if(Auth::guard('member')->check())
    <ul class="nav navbar-nav float-xs-right">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(Auth::guard('member')->user()->email)) }}?s=13" class="rounded" style="margin-right: 0.5rem;">
                {{ Auth::guard('member')->user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <h6 class="dropdown-header">Your account</h6>
                <a class="dropdown-item disabled" href="#">Profile</a>
                <a class="dropdown-item disabled" href="#">Settings</a>
                <a class="dropdown-item disabled" href="#">Security</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">Change store</h6>
                <a class="dropdown-item disabled" href="#">@{{ STORENAME }}</a>
                <a class="dropdown-item disabled" href="#">@{{ STORENAME }}</a>
                <a class="dropdown-item disabled" href="#">@{{ STORENAME }}</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#logout">Logout</a>
            </div>
        </li>
    </ul>
@endif
</nav>{{-- /.header-nav --}}

<nav class="drawer-nav">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('glitter.admin.index') }}">ホーム</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('glitter.admin.orders.index') }}">受注管理</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('glitter.admin.products.index') }}">商品管理</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('glitter.admin.customers.index') }}">顧客管理</a>
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
