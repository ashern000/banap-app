<?php

declare(strict_types=1);

namespace Application\UseCases\Field\FieldShowByIdUser;

final class OutputBoundary
{
    private array $name;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
    }
}
