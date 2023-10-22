<?php

declare(strict_types=1);

namespace src\Application\UseCases\Field\FieldEdit;

use src\Application\Contracts\SessionValidator;
use src\Domain\Entities\Field;
use src\Infraestructure\Repositories\MySQL\FieldRepository;
use src\Application\UseCases\Field\FieldEdit\OutputBoundary;
use src\Application\UseCases\Field\FieldEdit\InputBoundary;

final class FieldEdit
{

    private SessionValidator $session;
    private FieldRepository $repository;

    public function __construct(FieldRepository $repository, SessionValidator $session)
    {
        $this->session = $session;
        $this->repository = $repository;
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $this->session->sessionValidate($input->getIdUser());
        $field = new Field();

        $centralPoint = ($input->getPointOne() + $input->getPointTwo() + $input->getPointThree() + $input->getPointFour()) / 4;
        $plantsPerField = 2;

        $field->setName($input->getName())->setIdUser($input->getIdUser())->setCulture($input->getCulture())->setWhenRegistered($input->getWhenRegistered())->setDescription($input->getDescription())->setPointOne($input->getPointOne())->setPointTwo($input->getPointTwo())->setPointThree($input->getPointThree())->setPointFour($input->getPointFour())->setAnalysis($input->getAnalysis())->setCentralPointField($centralPoint)->setSpace($input->getSpace())->setPlantsPerField($plantsPerField)->setLastDayFertilized($input->getLastDayFertilized());

        $field = $this->repository->edit($field);

        return new OutputBoundary([
            "idUser" => $input->getIdUser(),
            "whenRegistered" => $input->getWhenRegistered(),
            "description" => $input->getDescription(),
            "space" => $input->getSpace(),
            "plantsPerField" => $plantsPerField,
            "centralPointField" => $centralPoint,
            "pointOne" => $input->getPointOne(),
            "pointTwo" => $input->getPointTwo(),
            "pointThree" => $input->getPointThree(),
            "pointFour" => $input->getPointFour()
        ]);
    }
}
