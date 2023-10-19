<?php

declare(strict_types=1);

namespace src\Infraestructure\Repositories\MySQL;

use src\Domain\Repositories\FieldRepositories\CreateFieldRepository;
use PDO;
use src\Domain\Entities\Field;

final class FieldRepository implements CreateFieldRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Field $field): Field
    {
        $query = "INSERT INTO ";
        $prepered = $this->pdo->prepare($query);
        $prepered->execute();

        $field = new Field();
        return $field;
    }
}
