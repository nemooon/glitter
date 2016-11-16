<?php

namespace Nemooon\Glitter\Infrastructure\Repositories\Domain\Eloquent;

use Nemooon\Glitter\Domain\Repositories\FileRepository;
use Nemooon\Glitter\Domain\Models\Entities\File;
use Nemooon\Glitter\Domain\Models\Values\FileId;
use Nemooon\Glitter\Infrastructure\Eloquents\EloquentFile;

class EloquentFileRepository implements FileRepository
{
    private $eloquent;

    public function __construct(EloquentFile $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    /**
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function find(FileId $id): File
    {
        return $this->eloquent->findOrFail($id->value())->toDomain();
    }
}
