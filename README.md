# Glitter for Laravel

以下の様にcomposer.jsonに"repositories"と"require"に追記
```
    "repositories": [
        {
            "type": "path",
            "url": "../glitter"
        }
    ],
    "require": {
        "php": ">=5.6.4",
        "laravel/framework": "5.3.*",
        "barryvdh/laravel-debugbar": "^2.3",
        "nemooon/glitter": "dev-master"
    },
```


`composer update`


configs/app.php
```
        /*
         * Package Service Providers...
         */
        Barryvdh\Debugbar\ServiceProvider::class,
        Nemooon\Glitter\Providers\GlitterServiceProvider::class,
        Nemooon\Glitter\Providers\AdminServiceProvider::class,
        Nemooon\Glitter\Providers\ShopServiceProvider::class,

        ･･･

        'Debugbar' => Barryvdh\Debugbar\Facade::class,
```

php artisan migrate
php artisan glitter:install
