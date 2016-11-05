@extends('glitter::layouts.shop')

@section('title', $page->title)

@section('content')
<div class="container py-3">

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ '/' }}">TOP</a></li>
    <li class="breadcrumb-item"><a href="{{ route('glitter.shop.front', ['store' => $store]) }}">{{ $store->name }}</a></li>
@foreach ($page->parents as $parent)
    <li class="breadcrumb-item"><a href="{{ $parent->permalink }}">{{ $parent->title }}</a></li>
@endforeach
    <li class="breadcrumb-item active">{{ $page->title }}</li>
</ol>

<div class="card">
    <div class="card-block">
        <h4 class="card-title">{{ $page->title }}</h4>
        <h6 class="card-subtitle text-muted">
            {{ $page->author->name }} @ {{ $page->publish_at }}
        </h6>
    </div>
    <div class="card-block">
        <p class="card-text">{!! nl2br(e($page->content)) !!}</p>
    </div>
</div>

<hr class="my-3">

<div class="row">

    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">親ページ</div>
            <div class="list-group list-group-flush">
@if ($page->parent)
                <a href="{{ $page->parent->permalink }}" class="list-group-item">{{ $page->parent->title }}</a>
@else
                <span class="list-group-item">-</span>
@endif
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">兄弟ページ</div>
            <div class="list-group list-group-flush">
@forelse ($page->siblings as $sibling)
                <a href="{{ $sibling->permalink }}" class="list-group-item">{{ $sibling->title }}</a>
@empty
                <span class="list-group-item">-</span>
@endforelse
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">子ページ</div>
            <div class="list-group list-group-flush">
@forelse ($page->children as $child)
                <a href="{{ $child->permalink }}" class="list-group-item">{{ $child->title }}</a>
@empty
                <span class="list-group-item">-</span>
@endforelse
            </div>
        </div>
    </div>

</div>

</div>
@endsection
