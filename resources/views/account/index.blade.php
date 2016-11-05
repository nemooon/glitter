@extends('glitter::layouts.shop')

@section('title', 'Admin')

@section('content')
<div class="container py-3">
Hi {{ Auth::guard('customer')->user()->name }}.
</div>
@endsection
