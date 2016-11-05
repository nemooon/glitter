<?php

Auth::routes();

Route::group([
    'middleware'  => 'auth:member',
], function () {

    Route::get('/', function () {
        return view('glitter::admin.index');
    })->name('index');

    Route::get('orders', 'OrdersController@index')->name('orders.index');

    Route::get('products', 'ProductsController@index')->name('products.index');

    Route::get('customers', 'CustomersController@index')->name('customers.index');

});
