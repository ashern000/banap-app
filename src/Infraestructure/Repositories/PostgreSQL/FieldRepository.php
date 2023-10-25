<?php

declare(strict_types=1);

namespace src\Infraestructure\Repositories\PostgreSQL;

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
        $query = "UPDATE Fields_Banap set nameField=:nameField, idUser=:idUser, descriptionField=:descriptionField, spaceField=:spaceField, whenRegistered=:whenRegistered, culture=:culture, plantsForField=:plantsForField, centerPointField=:centerPointField, lastDayFertilized=:lastDayFertilized, pointOne=:pointOne, pointTwo=:pointTwo, pointThree=:pointThree, pointFour=:pointFour, analisys=:analisys WHERE id = :idField";
        $queryForId = "SELECT F.id FROM Fields_Banap F INNER JOIN users U ON F.id = U.id WHERE F.`nameField`= :nameField";
        $preperedId = $this->pdo->prepare($queryForId);
        $preperedId->bindValue(":nameField", $field->getName(), PDO::PARAM_STR);

        $preperedId->execute();
        $id = $preperedId->fetch();

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

    public function delete(Field $field, int $id): Field
    {
        $query = "DELETE  FROM Fields_Banap WHERE id=:idField";
        $prepered = $this->pdo->prepare($query);
        $prepered->bindValue(":idField", $id);
        $prepered->execute();
        return $field;
    }

    public function showById(int $idUser): Field
    {
        $query = "SELECT * FROM Fields_Banap WHERE id = :idField";
        $prepered = $this->pdo->prepare($query);
        $prepered->bindValue(":idField", $idUser);
        $prepered->execute();
        $field = $prepered->fetch();
        return new Field();
    }
}
