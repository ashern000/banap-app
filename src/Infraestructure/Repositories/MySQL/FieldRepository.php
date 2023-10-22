<?php

declare(strict_types=1);

namespace src\Infraestructure\Repositories\MySQL;

use Exception;
use src\Domain\Repositories\FieldRepositories\CreateFieldRepository;
use PDO;
use src\Domain\Entities\Field;
use src\Domain\Repositories\FieldRepositories\DeleteFieldRepository;
use src\Domain\Repositories\FieldRepositories\EditFieldRepository;

final class FieldRepository implements CreateFieldRepository, EditFieldRepository, DeleteFieldRepository
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

    public function edit(Field $field): Field
    {
        $query = "UPDATE Fields_Banap column=:nameField, column=:idUser, column=:descriptionField, column=:spaceField, column=:whenRegistered, column=:culture, column=:plantsPerField, column=:centerPointField, column=:lastDayFertilized, column=:pointOne, column=:pointTwo, column=:pointThree, column=:pointFour, column=:analisys WHERE id = :idField";
        $queryForId = "SELECT F.id FROM Fields_Banap F INNER JOIN users U ON F.id = U.id WHERE F.`nameField`= :nameField";
        $preperedId = $this->pdo->prepare($queryForId);
        $preperedId->bindValue(":nameField", $field->getName(), PDO::PARAM_STR);

        $preperedId->execute();
        $id = $preperedId->fetchAll();

        $prepered = $this->pdo->prepare($query);

        $prepered->bindValue(":idField", $id['id']);
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

    public function delete(Field $field): Field
    {
        
        return $field;
    }
}
