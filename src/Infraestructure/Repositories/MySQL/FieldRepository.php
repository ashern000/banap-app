<?php

declare(strict_types=1);

namespace src\Infraestructure\Repositories\MySQL;

use src\Domain\Repositories\FieldRepositories\ShowByIdUserRepository;
use Exception;
use src\Domain\Repositories\FieldRepositories\CreateFieldRepository;
use PDO;
use src\Domain\Entities\Field;
use src\Domain\Repositories\FieldRepositories\DeleteFieldRepository;
use src\Domain\Repositories\FieldRepositories\EditFieldRepository;
use src\Domain\Repositories\FieldRepositories\FindFieldById;

final class FieldRepository implements CreateFieldRepository, EditFieldRepository, DeleteFieldRepository, ShowByIdUserRepository, FindFieldById
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
        var_dump($queryForId);
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

    public function delete(int $id): Field
    {
        $query = "DELETE FROM Fields_Banap WHERE id=:idField";
        $prepered = $this->pdo->prepare($query);
        $prepered->bindValue(":idField", $id);
        $prepered->execute();
        $field = new Field();
        $field->setId($id);
        return $field;
    }

    public function showById(int $idUser)
    {
        $query = "SELECT * FROM Fields_Banap WHERE idUser = :idUser ORDER BY nameField";
        $prepered = $this->pdo->prepare($query);
        $prepered->bindValue(":idUser", $idUser);
        $prepered->execute();
        $field = $prepered->fetchAll();
        return $field;
    }

    public function findById($id): Field
    {
        $query = "SELECT * FROM Fields_Banap WHERE id = :id";
        $prepered = $this->pdo->prepare($query);
        $prepered->bindValue(":id", $id);
        $prepered->execute();
        $fieldData = $prepered->fetch();
        $field = new Field();
        $field->setName($fieldData['nameField'])->setCulture($fieldData['culture'])->setDescription($fieldData['descriptionField'])->setPointOne((float)$fieldData['pointOne'])->setPointTwo((float)$fieldData['pointTwo'])->setPointThree((float)$fieldData['pointThree'])->setPointFour((float)$fieldData['pointFour'])->setPlantsPerField((int)$fieldData['plantsForField'])->setSpace((float)$fieldData['spaceField'])->setWhenRegistered($fieldData['whenRegistered'])->setIdUser((int)$fieldData['idUser'])->setLastDayFertilized($fieldData['lastDayFertilized'])->setAnalysis((int)$fieldData['analisys'])->setCentralPointField((float)$fieldData['centerPointField']);
        return $field;
    }
}
