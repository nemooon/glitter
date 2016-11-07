<?php

Auth::routes();

Route::group([
    'middleware'  => 'auth:member',
], function () {

    Route::get('/', function () {
        return view('glitter::admin.index');
    })->name('index');

    Route::get('switch/{id}', function ($store) {
        $member = Auth::guard('member')->user();
        $store = $member->switchable_stores->where('slug', $store)->first();
        if ($store) {
            $last_login_at = \Carbon\Carbon::now();
            $member->activeStore()->updateExistingPivot($store->getKey(), compact('last_login_at'));
        }
        return redirect()->back();
    })->name('store_switch');

    Route::get('account', 'AccountController@index')->name('account.index');
    Route::get('account/profile', 'AccountController@profile')->name('account.profile');
    Route::get('account/security', 'AccountController@security')->name('account.security');

    Route::get('orders', 'OrdersController@index')->name('orders.index');

    Route::get('products', 'ProductsController@index')->name('products.index');

    Route::get('customers', 'CustomersController@index')->name('customers.index');

});
