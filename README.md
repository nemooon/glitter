# Glitter for Laravel

## インストールまで

おもむろにLaravelプロジェクトを作る。（5.3以上）
`laravel new giltter-sample`


Laravelプロジェクトのcomposer.jsonに"repositories"と"require"に追記
urlはチェックアウトしてきたglitterに合わせて、デバッグバーはお好みで。
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

で、インストール。
`composer update`


GlitterのServiceProviderをLaravelプロジェクトのconfigs/app.phpに追加する。
デバッグバーはお好みで。
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
↑この分け方は変わるかもね。

マイグレーション！
`php artisan migrate`
ちなみに、マイグレーションファイルはリリースまでアップデートしちゃうので、
コケた場合は一回DB空っぽにしてください。

Glitter用のサンプルデータをインサート。
php artisan glitter:install

## フロント側のビルド

yarnを使うよ。

Bootstrap4進化してるね。
`yarn add bootstrap@4.0.0-alpha.5 --dev`

フォントアイコンもね。5が出るよ。
`yarn add font-awesome --dev`

gulpfile.jsに以下をば、
```
    mix.copy('vendor/nemooon/glitter/resources/assets/sass', 'resources/assets/sass/glitter')
       .copy('vendor/nemooon/glitter/resources/assets/js', 'resources/assets/js/glitter')
       .copy('node_modules/font-awesome/fonts', 'public/fonts')
       .sass('glitter/admin/glitter-admin.scss')
       .webpack('glitter/admin/glitter-admin.js');
```

ビルド！
`yarn run dev`
or
`yarn run prod`


糸冬
