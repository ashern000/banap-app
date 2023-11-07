<?php

declare(strict_types=1);

namespace src\Domain\Entities;

use DateTime;

final class Analysis
{
    private float $numberOfAnalysis;
    private float $organicMaterial;
    private float $carbonic;
    private float $phosphor;
    private float $calcium;
    private float $magnesium;
    private float $potassium;
    private float $zinc;
    private float $manganese;
    private float $iron;
    private float $copper;
    private float $blur;
    private float $sulfor;
    private float $quantityDirtInCollected;
    private DateTime $dataOfAnalysis;
    private float $needForLiming;
    private float $DesiredBaseSaturation;
    private float $CurrentBaseSaturation;
    private float $TotalCationExchangeCapacity;
    private float $RelativeTotalNeutralizingPower;

    /**
     * Get the value of numberOfAnalysis
     */
    public function getNumberOfAnalysis(): float
    {
        return $this->numberOfAnalysis;
    }

    /**
     * Set the value of numberOfAnalysis
     */
    public function setNumberOfAnalysis(float $numberOfAnalysis): Analysis
    {
        $this->numberOfAnalysis = $numberOfAnalysis;

        return $this;
    }

    /**
     * Get the value of organicMaterial
     */
    public function getOrganicMaterial(): float
    {
        return $this->organicMaterial;
    }

    /**
     * Set the value of organicMaterial
     */
    public function setOrganicMaterial(float $organicMaterial): Analysis
    {
        $this->organicMaterial = $organicMaterial;

        return $this;
    }

    /**
     * Get the value of carbonic
     */
    public function getCarbonic(): float
    {
        return $this->carbonic;
    }

    /**
     * Set the value of carbonic
     */
    public function setCarbonic(float $carbonic): Analysis
    {
        $this->carbonic = $carbonic;

        return $this;
    }

    /**
     * Get the value of phosphor
     */
    public function getPhosphor(): float
    {
        return $this->phosphor;
    }

    /**
     * Set the value of phosphor
     */
    public function setPhosphor(float $phosphor): Analysis
    {
        $this->phosphor = $phosphor;

        return $this;
    }

    /**
     * Get the value of calcium
     */
    public function getCalcium(): float
    {
        return $this->calcium;
    }

    /**
     * Set the value of calcium
     */
    public function setCalcium(float $calcium): Analysis
    {
        $this->calcium = $calcium;

        return $this;
    }

    /**
     * Get the value of magnesium
     */
    public function getMagnesium(): float
    {
        return $this->magnesium;
    }

    /**
     * Set the value of magnesium
     */
    public function setMagnesium(float $magnesium): Analysis
    {
        $this->magnesium = $magnesium;

        return $this;
    }

    /**
     * Get the value of potassium
     */
    public function getPotassium(): float
    {
        return $this->potassium;
    }

    /**
     * Set the value of potassium
     */
    public function setPotassium(float $potassium): Analysis
    {
        $this->potassium = $potassium;

        return $this;
    }

    /**
     * Get the value of zinc
     */
    public function getZinc(): float
    {
        return $this->zinc;
    }

    /**
     * Set the value of zinc
     */
    public function setZinc(float $zinc): Analysis
    {
        $this->zinc = $zinc;

        return $this;
    }

    /**
     * Get the value of manganese
     */
    public function getManganese(): float
    {
        return $this->manganese;
    }

    /**
     * Set the value of manganese
     */
    public function setManganese(float $manganese): Analysis
    {
        $this->manganese = $manganese;

        return $this;
    }

    /**
     * Get the value of iron
     */
    public function getIron(): float
    {
        return $this->iron;
    }

    /**
     * Set the value of iron
     */
    public function setIron(float $iron): Analysis
    {
        $this->iron = $iron;

        return $this;
    }

    /**
     * Get the value of copper
     */
    public function getCopper(): float
    {
        return $this->copper;
    }

    /**
     * Set the value of copper
     */
    public function setCopper(float $copper): Analysis
    {
        $this->copper = $copper;

        return $this;
    }

    /**
     * Get the value of blur
     */
    public function getBlur(): float
    {
        return $this->blur;
    }

    /**
     * Set the value of blur
     */
    public function setBlur(float $blur): Analysis
    {
        $this->blur = $blur;

        return $this;
    }

    /**
     * Get the value of sulfor
     */
    public function getSulfor(): float
    {
        return $this->sulfor;
    }

    /**
     * Set the value of sulfor
     */
    public function setSulfor(float $sulfor): Analysis
    {
        $this->sulfor = $sulfor;

        return $this;
    }

    /**
     * Get the value of quantityDirtInCollected
     */
    public function getQuantityDirtInCollected(): float
    {
        return $this->quantityDirtInCollected;
    }

    /**
     * Set the value of quantityDirtInCollected
     */
    public function setQuantityDirtInCollected(float $quantityDirtInCollected): Analysis
    {
        $this->quantityDirtInCollected = $quantityDirtInCollected;

        return $this;
    }

    /**
     * Get the value of dataOfAnalysis
     */
    public function getDataOfAnalysis(): DateTime
    {
        return $this->dataOfAnalysis;
    }

    /**
     * Set the value of dataOfAnalysis
     */
    public function setDataOfAnalysis(DateTime $dataOfAnalysis): Analysis
    {
        $this->dataOfAnalysis = $dataOfAnalysis;

        return $this;
    }

    /**
     * Get the value of needForLiming
     */
    public function getNeedForLiming(): float
    {
        return $this->needForLiming;
    }

    /**
     * Set the value of needForLiming
     */
    public function setNeedForLiming(float $needForLiming): Analysis
    {
        $this->needForLiming = $needForLiming;

        return $this;
    }

    /**
     * Get the value of DesiredBaseSaturation
     */
    public function getDesiredBaseSaturation(): float
    {
        return $this->DesiredBaseSaturation;
    }

    /**
     * Set the value of DesiredBaseSaturation
     */
    public function setDesiredBaseSaturation(float $DesiredBaseSaturation): Analysis
    {
        $this->DesiredBaseSaturation = $DesiredBaseSaturation;

        return $this;
    }

    /**
     * Get the value of CurrentBaseSaturation
     */
    public function getCurrentBaseSaturation(): float
    {
        return $this->CurrentBaseSaturation;
    }

    /**
     * Set the value of CurrentBaseSaturation
     */
    public function setCurrentBaseSaturation(float $CurrentBaseSaturation): Analysis
    {
        $this->CurrentBaseSaturation = $CurrentBaseSaturation;

        return $this;
    }

    /**
     * Get the value of TotalCationExchangeCapacity
     */
    public function getTotalCationExchangeCapacity(): float
    {
        return $this->TotalCationExchangeCapacity;
    }

    /**
     * Set the value of TotalCationExchangeCapacity
     */
    public function setTotalCationExchangeCapacity(float $TotalCationExchangeCapacity): Analysis
    {
        $this->TotalCationExchangeCapacity = $TotalCationExchangeCapacity;

        return $this;
    }

    /**
     * Get the value of RelativeTotalNeutralizingPower
     */
    public function getRelativeTotalNeutralizingPower(): float
    {
        return $this->RelativeTotalNeutralizingPower;
    }

    /**
     * Set the value of RelativeTotalNeutralizingPower
     */
    public function setRelativeTotalNeutralizingPower(float $RelativeTotalNeutralizingPower): Analysis
    {
        $this->RelativeTotalNeutralizingPower = $RelativeTotalNeutralizingPower;

        return $this;
    }
}
