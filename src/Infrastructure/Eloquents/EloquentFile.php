<?php

namespace Nemooon\Glitter\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Nemooon\Glitter\Domain\Models\Domainable;
use Nemooon\Glitter\Domain\Models\Entities\File;
use Nemooon\Glitter\Domain\Models\Values\FileId;

class EloquentFile extends Model implements Domainable
{
    protected $table = 'media';

    public function toDomain(): File
    {
        $args = [
            new FileId($this->getKey()),
            $this->filename,
            $this->path,
        ];
        return new File(...$args);
    }
}
