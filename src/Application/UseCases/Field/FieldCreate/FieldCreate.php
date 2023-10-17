<?php

namespace src\Application\UseCases\Field\FieldCreate;

use Domain\Repositories\FieldRepositories\CreateFieldRepository;
use src\Application\Contracts\SessionValidator;
use src\Application\UseCases\Field\FieldCreate\InputBoundary;
use src\Application\UseCases\Field\FieldCreate\OutputBoundary;
use src\Domain\Entities\Field;

declare(strict_types=1);

final class FieldCreate
{
    private CreateFieldRepository $repository;
    private SessionValidator $session;


    public function __construct(CreateFieldRepository $repository, SessionValidator $session)
    {
        $this->repository = $repository;
        $this->session = $session;
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $this->session->sessionValidate($input->getIdUser());
        $field = new Field();
        $centralPoint = ($input->getPointOne() + $input->getPointTwo() + $input->getPointThree() + $input->getPointFour()) / 4;
        $field->setName($input->getName())->setIdUser($input->getIdUser())->setCulture($input->getCulture())->setWhenRegistered($input->getWhenRegistered())->setDescription($input->getDescription())->setPointOne($input->getPointOne())->setPointTwo($input->getPointTwo())->setPointThree($input->getPointThree())->setPointFour($input->getPointFour())->setAnalysis($input->getAnalysis())->setCentralPointField($centralPoint);
        $this->repository->save($field);
        return new OutputBoundary([]);
    }
}
