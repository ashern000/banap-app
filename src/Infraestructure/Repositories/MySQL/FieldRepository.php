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
        $query = "INSERT INTO Fields_Banap(nameField,idUser,descriptionField,spaceField,whenRegistered,culture,plantsForField,centerPointField,lastDayFertilized,pointOne, pointTwo,pointThree,pointFour,analisys) VALUES (:nameField, :descriptionField, :spaceField, :whenRegistered, :culture, :plantsForField, :centerPointField, :lastDayFertilized, :pointOne, :pointTwo, :pointThree, :pointFour, :analisys);";
        $prepered = $this->pdo->prepare($query);
        $prepered->bindParam(":nameField", $field->getName(), PDO::PARAM_STR);
        $prepered->bindParam(":descriptionField", $field->getDescription(), PDO::PARAM_STR);
        $prepered->bindParam(":spaceField", $field->getSpace(), PDO::PARAM_STR);
        $prepered->bindParam(":whenRegistered", $field->getWhenRegistered(), PDO::PARAM_STR);
        
        $prepered->execute();

        $field = new Field();
        return $field;
    }
}
