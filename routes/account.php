<?php

Auth::routes();

Route::group([
    'middleware' => 'auth:customer',
    'prefix'     => 'account',
], function () {

    Route::get('/', function () {
        return view('glitter::account.index');
    })->name('index');

});
