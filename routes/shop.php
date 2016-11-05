<?php

Route::get('/', function () {
    return view('glitter::front');
})->name('index');

Route::group([
    'prefix'     => '{store}',
], function () {

    Route::get('/', 'PageController@front')->name('front');

    Route::get('{path}', 'PageController@page')->where('path', '(.*)')->name('page');

});
