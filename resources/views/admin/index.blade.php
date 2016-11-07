@extends('glitter::layouts.admin')

@section('title', 'Admin')

@section('content')
<header class="header">
    <div class="header-title float-md-left">ホーム</div>
</header>

<div class="content">
Hi {{ Auth::guard('member')->user()->name }}. Welcome to Glitter Admin!
</div>
@endsection
