<?php

declare(strict_types=1);

namespace Application\UseCases\Field\FieldShowByIdUser;

use Domain\Repositories\FieldRepositories\ShowByIdUserRepository;
use src\Application\Contracts\SessionValidator;

final class FieldShowByIdUser
{
    private ShowByIdUserRepository $repository;
    private SessionValidator $session;

    public function __construct(ShowByIdUserRepository $repository, SessionValidator $session)
    {
        $this->repository = $repository;
        $this->session = $session;
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $this->session->sessionValidate($input->getIdUser());
        $field = $this->repository->showById($input->getIdUser());
        return new OutputBoundary([]);
    }
}
