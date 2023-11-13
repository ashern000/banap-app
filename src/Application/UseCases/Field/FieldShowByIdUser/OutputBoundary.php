<?php

declare(strict_types=1);

namespace src\Application\UseCases\Field\FieldShowByIdUser;

final class OutputBoundary
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
