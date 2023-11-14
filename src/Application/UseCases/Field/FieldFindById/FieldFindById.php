<?php

declare(strict_types=1);

namespace src\Application\UseCases\Field\FieldFindById;

use Exception;
use src\Application\Contracts\SessionUserLogged;
use src\Domain\Repositories\FieldRepositories\FindFieldById;
use src\Application\UseCases\Field\FieldFindById\InputBoundary;
use src\Application\UseCases\Field\FieldFindById\OutputBoundary;

final class FieldFindById
{
    private FindFieldById $repository;
    private SessionUserLogged $session;

    public function __construct(FindFieldById $repository, SessionUserLogged $session)
    {
        $this->repository = $repository;
        $this->session = $session;
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        if ($this->session->userLoggedIn()) {
            $output = $this->repository->findById($input->getId());
            return new OutputBoundary([
                "name"=>$output->getName(),
                "lastDayFertilized"=>$output->getLastDayFertilized(),
                "analysis"=>$output->getAnalysis(),
                "idUser" => $output->getIdUser(),
                "whenRegistered" => $output->getWhenRegistered(),
                "description" => $output->getDescription(),
                "space" => $output->getSpace(),
                "plantsPerField" => $output->getPlantsPerField(),
                "centralPointField" => $output->getCentralPointField(),
                "pointOne" => $output->getPointOne(),
                "pointTwo" => $output->getPointTwo(),
                "pointThree" => $output->getPointThree(),
                "pointFour" => $output->getPointFour()
            ]);
        } else {
            throw new Exception("Usuário não logado");
        }
    }
}
