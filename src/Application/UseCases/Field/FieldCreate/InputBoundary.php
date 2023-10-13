<?php

declare(strict_types=1);

namespace src\Application\UseCases\Field\FieldCreate;


use DateTime;
final class InputBoundary {
    private string $name;
    private int $idUser;
    private string $description;
    private float $space;
    private DateTime $whenRegistered;
    private string $culture;
    private int $plantsPerField;
    private float $centralPointField;
    private DateTime $lastDayFertilized;
    private float $pointOne, $pointTwo, $pointThree, $pointFour;
    private array $analysis;

    public function __construct(int $idUser, string $name, string $description, float $space, DateTime $whenRegistered, string $culture, int $plantsPerField, float $centralPointField, DateTime $lastDayFertilized, float $pointOne, float $pointTwo, float $pointThree, float $pointFour, array $analysis) {
        $this->idUser = $idUser;
        $this->name = $name;
        $this->description = $description;
        $this->space = $space;
        $this->whenRegistered = $whenRegistered;
        $this->culture = $culture;
        $this->plantsPerField = $plantsPerField;
        $this->centralPointField = $centralPointField;
        $this->lastDayFertilized = $lastDayFertilized;
        $this->pointOne = $pointOne;
        $this->pointTwo = $pointTwo;
        $this->pointThree = $pointThree;
        $this->pointFour = $pointFour;
        $this->analysis[] = $analysis;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of idUser
     */
    public function getIdUser(): int
    {
        return $this->idUser;
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
     * Get the value of whenRegistered
     */
    public function getWhenRegistered(): DateTime
    {
        return $this->whenRegistered;
    }

    /**
     * Get the value of culture
     */
    public function getCulture(): string
    {
        return $this->culture;
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
     * Get the value of lastDayFertilized
     */
    public function getLastDayFertilized(): DateTime
    {
        return $this->lastDayFertilized;
    }

    /**
     * Get the value of analysis
     */
    public function getAnalysis(): array
    {
        return $this->analysis;
    }

    /**
     * Get the value of pointOne
     */
    public function getPointOne(): float
    {
        return $this->pointOne;
    }

    /**
     * Get the value of pointOne
     */
    public function getPointTwo(): float
    {
        return $this->pointTwo;
    }
}