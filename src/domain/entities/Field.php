<?php

declare(strict_types=1);

namespace src\Domain\Entities;

use DateTime;

final class Field
{
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



    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): Field
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of idUser
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     */
    public function setIdUser(int $idUser): Field
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription(string $description): Field
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of space
     */
    public function getSpace(): float
    {
        return $this->space;
    }

    /**
     * Set the value of space
     */
    public function setSpace(float $space): Field
    {
        $this->space = $space;

        return $this;
    }

    /**
     * Get the value of whenRegistered
     */
    public function getWhenRegistered(): DateTime
    {
        return $this->whenRegistered;
    }

    /**
     * Set the value of whenRegistered
     */
    public function setWhenRegistered(DateTime $whenRegistered): Field
    {
        $this->whenRegistered = $whenRegistered;

        return $this;
    }

    /**
     * Get the value of culture
     */
    public function getCulture(): string
    {
        return $this->culture;
    }

    /**
     * Set the value of culture
     */
    public function setCulture(string $culture): Field
    {
        $this->culture = $culture;

        return $this;
    }

    /**
     * Get the value of plantsPerField
     */
    public function getPlantsPerField(): int
    {
        return $this->plantsPerField;
    }

    /**
     * Set the value of plantsPerField
     */
    public function setPlantsPerField(int $plantsPerField): Field
    {
        $this->plantsPerField = $plantsPerField;

        return $this;
    }

    /**
     * Get the value of centralPointField
     */
    public function getCentralPointField(): float
    {
        return $this->centralPointField;
    }

    /**
     * Set the value of centralPointField
     */
    public function setCentralPointField(float $centralPointField): Field
    {
        $this->centralPointField = $centralPointField;

        return $this;
    }

    /**
     * Get the value of lastDayFertilized
     */
    public function getLastDayFertilized(): DateTime
    {
        return $this->lastDayFertilized;
    }

    /**
     * Set the value of lastDayFertilized
     */
    public function setLastDayFertilized(DateTime $lastDayFertilized): Field
    {
        $this->lastDayFertilized = $lastDayFertilized;

        return $this;
    }

    /**
     * Get the value of pointOne
     */
    public function getPointOne(): float
    {
        return $this->pointOne;
    }

    /**
     * Set the value of pointOne
     */
    public function setPointOne(float $pointOne): Field
    {
        $this->pointOne = $pointOne;

        return $this;
    }

    /**
     * Get the value of analysis
     */
    public function getAnalysis(): array
    {
        return $this->analysis;
    }

    /**
     * Set the value of analysis
     */
    public function setAnalysis(Analysis $analysis): Field
    {
        $this->analysis[] = $analysis;

        return $this;
    }
}
