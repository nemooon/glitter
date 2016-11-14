@extends('glitter::admin.layouts.admin')

@section('title', 'ホーム')


@section('main')
<main class="main-section">
Hi {{ Auth::guard('member')->user()->name }}. Welcome to Glitter Admin!
</main>
@endsection
