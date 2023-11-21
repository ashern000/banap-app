<?php

declare(strict_types=1);

namespace src\Application\UseCases\Field\FieldDelete;

final class InputBoundary
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of idUser
     */

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }
}
