<?php

namespace Nemooon\Glitter\Domain\Models\Entities;

use Nemooon\Glitter\Domain\Models\Values\ItemId;
use Nemooon\Glitter\Domain\Models\Entities\File;

class Item
{
    /** @var ItemId */
    private $id;

    /** @var string */
    public $name;

    /** @var ImageFile */
    private $thumbnail;

    public function __construct(ItemId $id)
    {
        $this->id = $id;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setThumbnail(File $image)
    {
        $this->thumbnail = $image;
    }

    public function thumbnail(): string
    {
        return $this->thumbnail ? $this->thumbnail->url() : '';
    }
}
