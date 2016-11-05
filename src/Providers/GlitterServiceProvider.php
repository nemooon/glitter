<?php

namespace Nemooon\Glitter\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Debug\ExceptionHandler;

class GlitterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/glitter.php', 'glitter');
        foreach (require __DIR__.'/../../config/auth.php' as $key => $config) {
            $this->app['config']->set("auth.{$key}", array_merge($config, $this->app['config']->get("auth.{$key}", [])));
        }

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'glitter');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/translations', 'glitter');

        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

            $this->publishes([
                __DIR__.'/../../database/migrations' => database_path('migrations'),
            ], 'glitter-migrations');

            $this->publishes([
                __DIR__.'/../../config/glitter.php' => config_path('glitter.php'),
            ], 'glitter-configs');

            $this->publishes([
                __DIR__.'/../../resources/views' => base_path('resources/views/vendor/glitter'),
            ], 'glitter-views');

            $this->publishes([
                __DIR__.'/../../resources/translations' => resource_path('lang/vendor/glitter'),
            ], 'glitter-translations');

            $this->publishes([
                __DIR__.'/../../resources/assets/js/components' => base_path('resources/assets/js/components/glitter'),
            ], 'glitter-components');

            $this->commands([
                \Nemooon\Glitter\Console\InstallCommand::class,
            ]);
        }
    }

    public function register()
    {
        //
    }
}
