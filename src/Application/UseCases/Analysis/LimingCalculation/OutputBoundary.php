<?php

declare(strict_types=1);

namespace src\Application\UseCases\Analysis\LimingCalculation;

final class OutputBoundary {
    private float $DesiredBaseSaturation;
    private float $CurrentBaseSaturation;
    private float $TotalCationExchangeCapacity;
    private float $RelativeTotalNeutralizingPower;
    private float $needForLiming;

    public function __construct(array $values){
        $this->DesiredBaseSaturation = $values["desired_base_saturation"];
        $this->CurrentBaseSaturation = $values["current_base_saturation"];
        $this->TotalCationExchangeCapacity = $values["total_cation_exchange_capacity"];
        $this->RelativeTotalNeutralizingPower = $values["relative_total_neutralizing"];
        $this->needForLiming = $values["need_for_liming"];
    }

    /**
     * Get the value of DesiredBaseSaturation
     */
    public function getDesiredBaseSaturation(): float
    {
        return $this->DesiredBaseSaturation;
    }

    /**
     * Get the value of CurrentBaseSaturation
     */
    public function getCurrentBaseSaturation(): float
    {
        return $this->CurrentBaseSaturation;
    }

    /**
     * Get the value of TotalCationExchangeCapacity
     */
    public function getTotalCationExchangeCapacity(): float
    {
        return $this->TotalCationExchangeCapacity;
    }

    /**
     * Get the value of RelativeTotalNeutralizingPower
     */
    public function getRelativeTotalNeutralizingPower(): float
    {
        return $this->RelativeTotalNeutralizingPower;
    }

    /**
     * Get the value of needForLiming
     */
    public function getNeedForLiming(): float
    {
        return $this->needForLiming;
    }
}