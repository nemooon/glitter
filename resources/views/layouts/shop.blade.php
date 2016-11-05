<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}" media="all" />
@stack('styles')
<script>
window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
]); ?>
</script>
</head>
<body>

<header class="navbar navbar-full navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/shops') }}">Shop List</a>
                </li>
            </li>
        </ul>
        <ul class="nav navbar-nav float-xs-right">
            @if(Auth::guard('customer')->check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::guard('customer')->user()->name }}</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <h6 class="dropdown-header">Account Service</h6>
                        <a class="dropdown-item" href="{{ url('/account') }}">Mypage</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#logout">Logout</a>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/register') }}">Register</a>
                </li>
            @endif
        </ul>
    </div>
</header>

<div id="app">
@yield('content')
</div>

<footer class="mt-3 py-2 bg-faded">
    <div class="container">
        <div class="row">
            <div class="col-md-6 py-2 text-md-left text-xs-center">
                <div>This package is under experimental.</div>
            </div>
            <div class="col-md-6 py-2 text-md-right text-xs-center">
                <nav class="nav nav-inline">
                    <a class="nav-link font-weight-bold text-muted" href="#">GitHub</a>
                    <a class="nav-link font-weight-bold text-muted" href="#">Twitter</a>
                    <a class="nav-link font-weight-bold text-muted" href="#">Examples</a>
                    <a class="nav-link font-weight-bold text-muted" href="#">About</a>
                    <a class="nav-link font-weight-bold text-muted" href="#">🇯🇵</a>
                </nav>
            </div>
        </div>
    </div>
</footer>

@if(Auth::guard('customer')->check())
<form id="logoutForm" role="form" method="POST" action="{{ url('/logout') }}">{{ csrf_field() }}</form>
@endif

<!-- Scripts -->
<script src="{{ asset('/js/app.js') }}"></script>

@yield('scripts')

</body>
</html>
