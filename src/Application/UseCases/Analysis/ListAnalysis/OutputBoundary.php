<?php

declare(strict_types=1);

namespace src\Application\UseCases\Analysis\ListAnalysis;

final class OutputBoundary
{
    private array $values;

    public function __construct(array $values)
    {
        $this->values = $values;
    }

 


    /**
     * Get the value of values
     *
     * @return array
     */
    public function getValues(): array {
        return $this->values;
    }
}
