<?php

declare(strict_types=1);

namespace src\Application\UseCases\Analysis\ListAnalysis;

use Exception;
use src\Application\Contracts\SessionUserLogged;
use src\Domain\Entities\Analysis;
use src\Infraestructure\Repositories\MySQL\AnalysisRepository;
use src\Application\UseCases\Analysis\ListAnalysis\InputBoundary;



final class ListAnalysis {
    private AnalysisRepository $repository;
    private SessionUserLogged $session;

    public function __construct(AnalysisRepository $repository, SessionUserLogged $session){
        $this->repository = $repository;
        $this->session = $session;
    }

    public function handle(InputBoundary $input):OutputBoundary {
        
        if(!$this->session->userLoggedIn()){
            throw new Exception("O usuário não está logado");
        }
        $analysis = new Analysis();
        $analysis->setIdField($input->getIdField());
        $output = $this->repository->listAnalysis($analysis);
        return new OutputBoundary([]);
    }
}