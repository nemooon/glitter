@extends('glitter::layouts.shop')

@section('title', 'Shop list')

@push('styles')
<link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">
@endpush

@section('content')
<div class="bg-inverse text-white py-3">
    <div class="container pt-3 pb-1">
        <div class="display-1 font-italic text-xs-center" style="font-family: 'Allura', cursive;">Glitter</div>
        <div class="lead text-xs-center mb-3">E-commerce Architecture for Laravel 5.3+</div>
        <div class="text-xs-center">
            <a href="#" class="btn btn-outline-secondary btn-lg">Getting Started</a><br>
        </div>
    </div>
</div>

<section class="my-3 py-3">
    <div class="container">
        <h1 class="text-xs-center">Nice Feature.</h1>
        <div class="lead text-xs-center mb-3">I know.</div>

        <div class="row">
            <div class="col-md-4 mt-2">
                <div class="card-block">
                    <h2 class="card-title">Multiple Stores</h2>
                    <p class="card-text">Text</p>
                    <a href="#" class="card-link">More</a>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card-block">
                    <h2 class="card-title">Glitter Admin</h2>
                    <p class="card-text">Useful and expandable admin page.</p>
                    <a href="#" class="card-link">More</a>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card-block">
                    <h2 class="card-title">Omni-Channel Ready</h2>
                    <p class="card-text">Design for any sales channels.</p>
                    <a href="#" class="card-link">More</a>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card-block">
                    <h2 class="card-title">Themeable</h2>
                    <p class="card-text">Creating theme by <a href="https://laravel.com/docs/blade" target="_blank">Blade templates</a>.</p>
                    <a href="#" class="card-link">More</a>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card-block">
                    <h2 class="card-title">Customizable</h2>
                    <p class="card-text">Implementation can all be extends.</p>
                    <a href="#" class="card-link">More</a>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card-block">
                    <h2 class="card-title">Inventory</h2>
                    <p class="card-text">Soon.</p>
                    <a href="#" class="card-link">More</a>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card-block">
                    <h2 class="card-title">Transfers</h2>
                    <p class="card-text">Soon.</p>
                    <a href="#" class="card-link">More</a>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card-block">
                    <h2 class="card-title">Discounts</h2>
                    <p class="card-text">Soon.</p>
                    <a href="#" class="card-link">More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<hr>

<section class="my-3 py-3">
    <div class="container">
        <h1 class="text-xs-center">Get Started.</h1>
        <div class="lead text-xs-center">It's so easy</div>

        <div class="mt-3 text-xs-center">
            <div class="d-inline-block rounded px-1 py-1 bg-inverse text-white">
                <samp>composer require nemooon/glitter</samp>
            </div>
            <div class="mt-2">
                👆 soon...
            </div>
        </div>
    </div>
</section>

<hr>

<section class="my-3 py-3">
    <div class="container">
        <h1 class="text-xs-center">Free License.</h1>
        <div class="lead text-xs-center">Licensed by GPLv3</div>
    </div>
</section>
@endsection
