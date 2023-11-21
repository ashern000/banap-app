<?php

declare(strict_types=1);

namespace src\Application\UseCases\Field\FieldFindById;


final class OutputBoundary
{
    private int $idUser;
    private string $name;
    private string $whenRegistered;
    private string $description;
    private float $space;
    private int $plantsPerField;
    private float $centralPointField;
    private float $pointOne;
    private float $pointTwo;
    private string $lastDayFertilized;
    private float $pointThree;
    private float $pointFour;
    private int $analysis;
    private string $culture;

    public function __construct(array $data)
    {
        $this->idUser = $data["idUser"];
        $this->name = $data["name"];
        $this->whenRegistered = $data["whenRegistered"];
        $this->description = $data["description"];
        $this->space = $data["space"];
        $this->plantsPerField = $data["plantsPerField"];
        $this->centralPointField = $data["centralPointField"];
        $this->pointOne = $data["pointOne"];
        $this->pointTwo = $data["pointTwo"];
        $this->lastDayFertilized = $data["lastDayFertilized"];
        $this->pointThree = $data["pointThree"];
        $this->pointFour = $data["pointFour"];
        $this->analysis = $data["analysis"];
        $this->culture = $data["culture"];
    }

    /**
     * Get the value of idUser
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of whenRegistered
     */
    public function getWhenRegistered(): string
    {
        return $this->whenRegistered;
    }

    /**
     * Get the value of description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Get the value of space
     */
    public function getSpace(): float
    {
        return $this->space;
    }

    /**
     * Get the value of plantsPerField
     */
    public function getPlantsPerField(): int
    {
        return $this->plantsPerField;
    }

    /**
     * Get the value of centralPointField
     */
    public function getCentralPointField(): float
    {
        return $this->centralPointField;
    }

    /**
     * Get the value of pointOne
     */
    public function getPointOne(): float
    {
        return $this->pointOne;
    }

    /**
     * Get the value of pointTwo
     */
    public function getPointTwo(): float
    {
        return $this->pointTwo;
    }

    /**
     * Get the value of lastDayFertilized
     */
    public function getLastDayFertilized(): string
    {
        return $this->lastDayFertilized;
    }

    /**
     * Get the value of pointThree
     */
    public function getPointThree(): float
    {
        return $this->pointThree;
    }

    /**
     * Get the value of pointFour
     */
    public function getPointFour(): float
    {
        return $this->pointFour;
    }

    /**
     * Get the value of analysis
     */
    public function getAnalysis(): int
    {
        return $this->analysis;
    }

    /**
     * Get the value of culture
     */
    public function getCulture(): string
    {
        return $this->culture;
    }
}
