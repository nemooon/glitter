<?php

namespace Nemooon\Glitter\Domain\Repositories;

use Nemooon\Glitter\Domain\Models\Entities\File;
use Nemooon\Glitter\Domain\Models\Values\FileId;

interface FileRepository
{
    public function find(FileId $id): File;
}
