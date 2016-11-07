@extends('glitter::layouts.admin')

@section('title', 'Admin')

@section('content')
<header class="header">
    <div class="header-title float-md-left"><i class="fa fa-home fa-fw" aria-hidden="true"></i> ホーム</div>
</header>

<div class="content">
Hi {{ Auth::guard('member')->user()->name }}. Welcome to Glitter Admin!
</div>
@endsection
