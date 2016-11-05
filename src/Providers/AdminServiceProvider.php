<?php

namespace Nemooon\Glitter\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class AdminServiceProvider extends ServiceProvider
{

    public function boot(Router $router)
    {
        if (!$this->app->routesAreCached()) {
            $this->mapAdminRoutes();
        }

        $router->middleware('glitter.guest', \Nemooon\Glitter\Http\Middleware\RedirectIfAuthenticated::class);
    }

    protected function mapAdminRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace'  => 'Nemooon\Glitter\Http\Controllers\Admin',
            'prefix'     => 'admin',
            'as'         => 'glitter.admin.',
        ], function () {
            require __DIR__.'/../../routes/admin.php';
        });
    }

}
