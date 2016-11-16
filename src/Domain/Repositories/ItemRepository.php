<?php

namespace Nemooon\Glitter\Domain\Repositories;

use Nemooon\Glitter\Domain\Models\Entities\Item;
use Nemooon\Glitter\Domain\Models\Values\ItemId;

interface ItemRepository
{
    public function find(ItemId $id): Item;

    public function all(): array;
}
