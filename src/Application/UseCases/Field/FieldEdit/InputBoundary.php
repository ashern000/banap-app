<?php

declare(strict_types=1);

namespace src\Application\UseCases\Field\FieldEdit;

final class InputBoundary
{
    private int $idUser;
    private string $name;
    private string $description;
    private float $space;
    private float $pointOne;
    private float $pointTwo;
    private float $pointThree;
    private float $pointFour;
    private string $culture;
    private int $analysis;
    private string $lastDayFertilized;
    private string $whenRegistered;
    public function __construct(int $idUser, string $description, float $space, float $pointOne, float $pointTwo, float $pointThree, float $pointFour, int $analysis, string $lastDayFertilized, string $culture, string $name, string $whenRegistered)
    {
        $this->idUser = $idUser;
        $this->description = $description;
        $this->space = $space;
        $this->pointOne = $pointOne;
        $this->pointTwo = $pointTwo;
        $this->pointThree = $pointThree;
        $this->pointFour = $pointFour;
        $this->analysis = $analysis;
        $this->lastDayFertilized = $lastDayFertilized;
        $this->culture = $culture;
        $this->name = $name;
        $this->whenRegistered = $whenRegistered;
    }



    /**
     * Get the value of idUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of space
     */
    public function getSpace()
    {
        return $this->space;
    }

    /**
     * Get the value of pointOne
     */
    public function getPointOne()
    {
        return $this->pointOne;
    }

    /**
     * Get the value of pointTwo
     */
    public function getPointTwo()
    {
        return $this->pointTwo;
    }

    /**
     * Get the value of pointThree
     */
    public function getPointThree()
    {
        return $this->pointThree;
    }

    /**
     * Get the value of pointFour
     */
    public function getPointFour()
    {
        return $this->pointFour;
    }

    /**
     * Get the value of analysis
     */
    public function getAnalysis()
    {
        return $this->analysis;
    }

    /**
     * Get the value of lastDayFertilized
     */
    public function getLastDayFertilized()
    {
        return $this->lastDayFertilized;
    }

    /**
     * Get the value of culture
     */
    public function getCulture()
    {
        return $this->culture;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of whenRegistered
     */
    public function getWhenRegistered()
    {
        return $this->whenRegistered;
    }
}
