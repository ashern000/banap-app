<?php

declare(strict_types=1);

namespace src\Domain\Repositories\FieldRepositories;

use src\Domain\Entities\Field;

interface CreateFieldRepository
{
    public function create(Field $field): Field;
}
