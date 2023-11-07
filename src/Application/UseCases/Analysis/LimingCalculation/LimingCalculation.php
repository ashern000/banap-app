<?php

declare(strict_types=1);

namespace src\Application\UseCases\Analysis\LimingCalculation;

use src\Domain\Repositories\AnalysisRepositories\RegisterLimingCalculation;

use src\Application\UseCases\Analysis\LimingCalculation\InputBoundary;
use src\Application\UseCases\Analysis\LimingCalculation\OutputBoundary;
use src\Domain\Entities\Analysis;

final class LimingCalculation
{
    private RegisterLimingCalculation $repository;

    public function __construct(RegisterLimingCalculation $repository)
    {
        $this->repository = $repository;
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $DesiredBaseSaturation = $input->getDesiredBaseSaturation();
        $CurrentBaseSaturation = $input->getCurrentBaseSaturation();
        $TotalCationExchangeCapacity = $input->getTotalCationExchangeCapacity();
        $RelativeTotalNeutralizingPower = $input->getRelativeTotalNeutralizingPower();
        $needForLiming = ($DesiredBaseSaturation - $CurrentBaseSaturation)
            * $TotalCationExchangeCapacity / $RelativeTotalNeutralizingPower;

        $analysis = new Analysis();
        
        $analysis->setCurrentBaseSaturation($CurrentBaseSaturation)->setDesiredBaseSaturation($DesiredBaseSaturation)->setTotalCationExchangeCapacity($TotalCationExchangeCapacity)->setRelativeTotalNeutralizingPower($RelativeTotalNeutralizingPower)->setNeedForLiming($needForLiming);

        $this->repository->registerLimingCalculation($analysis);
        
        return new OutputBoundary([]);
    }
}
