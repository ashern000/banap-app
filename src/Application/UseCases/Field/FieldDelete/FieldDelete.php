<?php

declare(strict_types=1);

namespace src\Application\UseCases\Field\FieldDelete;

use src\Application\Contracts\SessionValidator;
use src\Domain\Entities\Field;
use src\Infraestructure\Repositories\MySQL\FieldRepository;
use src\Application\UseCases\Field\FieldDelete\InputBoundary;
use src\Application\UseCases\Field\FieldDelete\OutputBoundary;

final class FieldDelete {
    private FieldRepository $repository;
    private SessionValidator $session;

    public function __construct(FieldRepository $repository, SessionValidator $session)
    {
        $this->repository = $repository;
        $this->session = $session;
    }

    public function handle(InputBoundary $input):OutputBoundary{
        $field = new Field();
        $field->setIdUser($input->getIdUser());
        $this->repository->delete($field, $input->getIdUser());
        return new OutputBoundary([]);
    }
}
