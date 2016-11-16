<?php

namespace Nemooon\Glitter\Domain\Models\Values;

class FileId
{
    /** @var int */
    protected $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}
