<?php

declare(strict_types=1);

namespace src\Application\UseCases\Field\FieldDelete;

final class OutputBoundary {
    private int $id;

    public function __construct(array $values){
        $this->id = $values['id'];
    }

    

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
} 