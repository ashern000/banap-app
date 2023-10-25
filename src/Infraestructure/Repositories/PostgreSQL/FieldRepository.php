<?php

declare(strict_types=1);

namespace Infraestructure\Repositories\PostgreSQL;

use PDO;
use src\Domain\Entities\Field;
use src\Domain\Repositories\FieldRepositories\CreateFieldRepository;
use src\Domain\Repositories\FieldRepositories\DeleteFieldRepository;
use src\Domain\Repositories\FieldRepositories\EditFieldRepository;
use src\Domain\Repositories\FieldRepositories\ShowByIdUserRepository;

final class FieldRepositoryPostgreSQL implements EditFieldRepository, CreateFieldRepository, DeleteFieldRepository, ShowByIdUserRepository
{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function create(Field $field): Field
    {
        return $field;
    }

    public function edit(Field $field): Field
    {
        return $field;
    }

    public function delete(Field $field, int $id): Field
    {
        return $field;
    }

    public function showById(int $idField): Field
    {
        $field = new Field();
        return $field;
    }
}
