<?php

declare (strict_types= 1);
namespace Infraestructure\Repositories\MySQL;
use Domain\Repositories\FieldRepositories\CreateFieldRepository;
use PDO;
use src\Domain\Entities\Field;
final class FieldRepositories implements CreateFieldRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create(Field $field): Field{
        $query = "INSERT INTO ";
        $prepered = $this->pdo->prepare($query);
        $prepered->execute();

        $field = new Field();
        return $field;
    }
}
