<?php

namespace src\Application\UseCases\Field\FieldCreate;

use src\Application\UseCases\Field\FieldCreate\InputBoundary;
use src\Application\UseCases\Field\FieldCreate\OutputBoundary;
use src\Domain\Entities\Field;

declare(strict_types=1);

final class FieldCreate {
    private $repository;
    private $session;


    public function __construct($repository, $session){
        $this->repository = $repository;
        $this->session = $session;
    }

    public function handle(InputBoundary $input):OutputBoundary{
        $this->session->sessionValidate($input->getIdUser());
        $field = new Field();
        $field->setName($input->getName())->setIdUser($input->getIdUser());
        $this->repository->save();
        return new OutputBoundary([]);
    }
}