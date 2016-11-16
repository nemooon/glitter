<?php

namespace Nemooon\Glitter\Providers;

use Illuminate\Support\ServiceProvider;
use Nemooon\Glitter\Domain\Repositories\{
    ItemRepository,
    FileRepository
};
use Nemooon\Glitter\Infrastructure\Repositories\Domain\Eloquent\{
    EloquentItemRepository,
    EloquentFileRepository
};

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ItemRepository::class, EloquentItemRepository::class);
        $this->app->bind(FileRepository::class, EloquentFileRepository::class);
    }
}
