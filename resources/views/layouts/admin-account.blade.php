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
        アカウント
    </a>
    <ul class="nav navbar-nav float-xs-right">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('glitter.admin.index') }}"><i class="fa fa-long-arrow-left fa-fw" aria-hidden="true"></i> ストアに戻る</a>
        </li>
    </ul>
</nav>{{-- /.header-nav --}}

<nav id="drawer" class="drawer-nav">
    <div class="drawer-nav-store">
        <ul class="nav hidden-sm-down">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('glitter.admin.index') }}"><i class="fa fa-long-arrow-left fa-fw" aria-hidden="true"></i> ストアに戻る</a>
            </li>
        </ul>
    </div>
    <div class="drawer-nav-content">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link{{ Request::is('admin/account/profile') ? ' active' : '' }}" href="{{ route('glitter.admin.account.profile') }}"><i class="fa fa-user-circle-o fa-fw" aria-hidden="true"></i> プロフィール</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ Request::is('admin/account/security') ? ' active' : '' }}" href="{{ route('glitter.admin.account.security') }}"><i class="fa fa-lock fa-fw" aria-hidden="true"></i> セキュリティ</a>
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
