<?php

namespace Nemooon\Glitter\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class ShopServiceProvider extends ServiceProvider
{

    public function boot(Router $router)
    {
        if (!$this->app->routesAreCached()) {
            $this->mapAccountRoutes();
            $this->mapShopRoutes();
        }
    }

    protected function mapShopRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace'  => 'Nemooon\Glitter\Http\Controllers',
            'prefix'     => '/',
            'as'         => 'glitter.',
        ], function () {
            require __DIR__.'/../../routes/shop.php';
        });
    }

    protected function mapAccountRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace'  => 'Nemooon\Glitter\Http\Controllers\Account',
            'prefix'     => '/',
            'as'         => 'glitter.account.',
        ], function () {
            require __DIR__.'/../../routes/account.php';
        });
    }

}
