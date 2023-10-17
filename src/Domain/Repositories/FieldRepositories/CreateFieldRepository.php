<?php

declare(strict_types=1);

namespace Domain\Repositories\FieldRepositories;

use src\Domain\Entities\Field;

interface CreateFieldRepository
{
    public function save(Field $field): Field;
}
