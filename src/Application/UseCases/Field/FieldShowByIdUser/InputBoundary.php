<?php

declare(strict_types=1);

namespace src\Application\UseCases\Field\FieldShowByIdUser;

final class InputBoundary
{
    private int $idUser;

    public function __construct(int $idUser)
    {
        $this->idUser = $idUser;
    }

    public function getIdUser(): int
    {
        return $this->idUser;
    }
}
