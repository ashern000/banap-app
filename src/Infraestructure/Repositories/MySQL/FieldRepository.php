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
        $query = "INSERT INTO Fields_Banap(nameField,idUser,descriptionField,spaceField,whenRegistered,culture,plantsForField,centerPointField,lastDayFertilized,pointOne, pointTwo,pointThree,pointFour,analisys) 
        VALUES (:nameField,:idUser ,:descriptionField, :spaceField, :whenRegistered, :culture, :plantsForField, :centerPointField, :lastDayFertilized, :pointOne, :pointTwo, :pointThree, :pointFour, :analisys);";
        $prepered = $this->pdo->prepare($query);

        $prepered->bindValue(":nameField", $field->getName(), PDO::PARAM_STR);
        $prepered->bindValue(":descriptionField", $field->getDescription(), PDO::PARAM_STR);
        $prepered->bindValue(":spaceField", $field->getSpace(), PDO::PARAM_STR);
        $prepered->bindValue(":whenRegistered", $field->getWhenRegistered(), PDO::PARAM_STR);
        $prepered->bindValue(":culture", $field->getCulture(), PDO::PARAM_STR);
        $prepered->bindValue(":plantsForField", $field->getPlantsPerField(), PDO::PARAM_INT);
        $prepered->bindValue(":centerPointField", $field->getCentralPointField(), PDO::PARAM_STR);
        $prepered->bindValue(":lastDayFertilized", $field->getLastDayFertilized(), PDO::PARAM_STR);
        $prepered->bindValue(":pointOne", $field->getPointOne(), PDO::PARAM_STR);
        $prepered->bindValue(":pointTwo", $field->getPointTwo(), PDO::PARAM_STR);
        $prepered->bindValue(":pointThree", $field->getPointThree(), PDO::PARAM_STR);
        $prepered->bindValue(":pointFour", $field->getPointFour(), PDO::PARAM_STR);
        $prepered->bindValue(":analisys", $field->getAnalysis(), PDO::PARAM_STR);
        $prepered->bindValue(":idUser", $field->getIdUser(), PDO::PARAM_INT);

        $prepered->execute();
        
        return $field;
    }
}
