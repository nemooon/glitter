<?php

namespace Nemooon\Glitter\Application\Services;

use Nemooon\Glitter\Domain\Repositories\ItemRepository;

class Products
{
    protected $itemRepo;

    public function __construct(ItemRepository $itemRepo)
    {
        $this->itemRepo = $itemRepo;
    }

    public function all(): array
    {
        return $this->itemRepo->all();
    }

    public function paginate(): array
    {
        return $this->itemRepo->paginate(50);
    }
}
