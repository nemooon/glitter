<?php

namespace Nemooon\Glitter\Domain\Models\Entities;

use Nemooon\Glitter\Domain\Models\Values\FileId;

class File
{
    /** @var FileId */
    private $id;

    private $filename;

    private $path;

    public function __construct(FileId $id, $filename, $path)
    {
        $this->id = $id;
        $this->filename = $filename;
        $this->path = $path;
    }

    public function url(): string
    {
        return \Storage::url($this->path);
    }
}
