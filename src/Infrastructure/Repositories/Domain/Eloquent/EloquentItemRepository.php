<?php

namespace Nemooon\Glitter\Infrastructure\Repositories\Domain\Eloquent;

use Nemooon\Glitter\Domain\Repositories\ItemRepository;
use Nemooon\Glitter\Domain\Models\Entities\Item;
use Nemooon\Glitter\Domain\Models\Values\ItemId;
use Nemooon\Glitter\Infrastructure\Eloquents\EloquentItem;

class EloquentItemRepository implements ItemRepository
{
    private $model;

    public function __construct(EloquentItem $model)
    {
        $this->model = $model;
    }

    /**
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function find(ItemId $id): Item
    {
        return $this->model->findOrFail($id->value())->toDomain();
    }

    public function all(): array
    {
        return EloquentItem::all()->map(function($model){
            return $model->toDomain();
        })->all();
    }

    public function paginate(int $perPage): array
    {
        return EloquentItem::paginate($perPage)->map(function($model){
            return $model->toDomain();
        })->all();
    }
}
