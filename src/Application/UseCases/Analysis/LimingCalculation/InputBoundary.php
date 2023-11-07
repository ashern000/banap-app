<?php

declare(strict_types=1);

namespace src\Application\UseCases\Analysis\LimingCalculation;

final class InputBoundary
{
    private float $DesiredBaseSaturation;
    private float $CurrentBaseSaturation;
    private float $TotalCationExchangeCapacity;
    private float $RelativeTotalNeutralizingPower;

    public function __construct(float $DesiredBaseSaturation, float $CurrentBaseSaturation, float $TotalCationExchangeCapacity, float $RelativeTotalNeutralizingPower)
    {
        $this->DesiredBaseSaturation = $DesiredBaseSaturation;
        $this->CurrentBaseSaturation = $CurrentBaseSaturation;
        $this->TotalCationExchangeCapacity = $TotalCationExchangeCapacity;
        $this->RelativeTotalNeutralizingPower = $RelativeTotalNeutralizingPower;
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
};
