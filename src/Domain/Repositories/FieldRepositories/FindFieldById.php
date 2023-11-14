<?php

declare(strict_types=1);

namespace src\Domain\Repositories\FieldRepositories;

use src\Domain\Entities\Field;

interface FindFieldById
{
    public function findById($id): Field;
}
