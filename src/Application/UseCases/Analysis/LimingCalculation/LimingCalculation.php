<?php

declare(strict_types=1);

namespace src\Application\UseCases\Analysis\LimingCalculation;

use src\Domain\Repositories\AnalysisRepositories\RegisterLimingCalculation;

use src\Application\UseCases\Analysis\LimingCalculation\InputBoundary;
use src\Application\UseCases\Analysis\LimingCalculation\OutputBoundary;
use src\Domain\Entities\Analysis;

use function DI\value;

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
        $id = $input->getId();

        $analysis = new Analysis();
        
        $analysis->setCurrentBaseSaturation($CurrentBaseSaturation)->setDesiredBaseSaturation($DesiredBaseSaturation)->setTotalCationExchangeCapacity($TotalCationExchangeCapacity)->setRelativeTotalNeutralizingPower($RelativeTotalNeutralizingPower)->setNeedForLiming($needForLiming)->setIdField($id);

        $this->repository->registerLimingCalculation($analysis);

        return new OutputBoundary(["desired_base_saturation" => $analysis->getDesiredBaseSaturation(), "current_base_saturation" => $analysis->getCurrentBaseSaturation(), "total_cation_exchange_capacity" => $analysis->getTotalcationExchangeCapacity(), "relative_total_neutralizing" => $analysis->getRelativeTotalNeutralizingPower(), "need_for_liming" => $analysis->getNeedForLiming()]);
    }
}
