@extends('glitter::layouts.shop')

@section('title', 'TOP')

@section('content')
<div class="container py-3">

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ '/' }}">TOP</a></li>
    <li class="breadcrumb-item active">{{ $store->name }}</li>
</ol>

<div class="list-group">
@foreach($pages as $page)
    <a href="{{ $page->permalink }}" class="list-group-item list-group-item-action">
        <h5 class="list-group-item-heading">{{ $page->title }}</h5>
        <p class="list-group-item-text">{{ $page->publish_at }}</p>
    </a>
@endforeach
</div>

</div>
@endsection
