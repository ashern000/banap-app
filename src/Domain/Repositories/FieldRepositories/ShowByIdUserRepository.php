<?php

declare(strict_types=1);

namespace Domain\Repositories\FieldRepositories;

use src\Domain\Entities\Field;

interface ShowByIdUserRepository
{
    public function showById(int $idUser): Field;
}
