<?php

declare(strict_types=1);

namespace src\Application\UseCases\Field\FieldEdit;

use src\Domain\Entities\Field;
use src\Application\UseCases\Field\FieldEdit\OutputBoundary;

final class FieldEdit
{

    private $session;
    private $repository;

    public function __construct($repository, $session)
    {
        $this->session = $session;
        $this->repository = $repository;
    }

    public function handle($input)
    {
        $this->session->sessionValidate($input->getIdUser());
        $field = new Field();

        $centralPoint = ($input->getPointOne() + $input->getPointTwo() + $input->getPointThree() + $input->getPointFour()) / 4;

        $field->setName($input->getName())->setIdUser($input->getIdUser())->setCulture($input->getCulture())->setWhenRegistered($input->getWhenRegistered())->setDescription($input->getDescription())->setPointOne($input->getPointOne())->setPointTwo($input->getPointTwo())->setPointThree($input->getPointThree())->setPointFour($input->getPointFour())->setAnalysis($input->getAnalysis())->setCentralPointField($centralPoint)->setSpace($input->getSpace())->setPlantsPerField($input->getPlantsPerField())->setLastDayFertilized($input->getLastDayFertilized());

        $field = $this->repository->edit($field);

        return new OutputBoundary([
            "idUser" => $input->getIdUser(),
            "whenRegistered" => $input->getWhenRegistered(),
            "description" => $input->getDescription(),
            "space" => $input->getSpace(),
            "plantsPerField" => $input->getPlantsPerField(),
            "centralPointField" => $input->getCentralPointField(),
            "pointOne" => $input->getPointOne(),
            "pointTwo" => $input->getPointTwo(),
            "pointThree" => $input->getPointThree(),
            "pointFour" => $input->getPointFour()
        ]);
    }
}
