<?php

declare(strict_types=1);

namespace src\Application\UseCases\Field\FieldDelete;

final class InputBoundary
{
    private int $idUser;
    private int $id;

    public function __construct(int $id, int $idUser)
    {
        $this->id = $id;
        $this->idUser = $idUser;
    }

    /**
     * Get the value of idUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }
}
