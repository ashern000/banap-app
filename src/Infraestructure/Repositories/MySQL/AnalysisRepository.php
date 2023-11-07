<?php

declare(strict_types=1);

namespace src\Infraestructure\Repositories\MySQL;

use src\Domain\Entities\Analysis;
use src\Domain\Repositories\AnalysisRepositories\RegisterLimingCalculation;

final class AnalysisRepository implements RegisterLimingCalculation
{
    public function registerLimingCalculation(Analysis $analysis): Analysis
    {
        $query = "INSERT INTO Analysis_Banap ()";
        return $analysis;
    }
}
