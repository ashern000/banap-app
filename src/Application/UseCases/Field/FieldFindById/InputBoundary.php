<?php

declare(strict_types=1);

namespace src\Application\UseCases\Field\FieldFindById;

final class InputBoundary
{
    private int $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
