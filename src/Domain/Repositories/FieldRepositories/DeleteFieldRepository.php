<?php

declare(strict_types=1);

namespace src\Domain\Repositories\FieldRepositories;

use src\Domain\Entities\Field;

interface DeleteFieldRepository
{
    public function delete(Field $field): Field;
}
