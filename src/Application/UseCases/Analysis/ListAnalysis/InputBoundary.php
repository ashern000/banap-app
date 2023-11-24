<?php

declare(strict_types=1);

namespace src\Application\UseCases\Analysis\ListAnalysis;

final class InputBoundary
{
    private int $idField;

    public function __construct(int $idField)
    {
        $this->idField = $idField;
    }

    /**
     * Get the value of idField
     *
     * @return int
     */
    public function getIdField(): int
    {
        return $this->idField;
    }
}
