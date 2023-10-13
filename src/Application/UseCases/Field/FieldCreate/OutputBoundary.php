<?php

declare(strict_types=1);

namespace src\Application\UseCases\Field\FieldCreate;

use DateTime;

final class OutputBoundary
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

    public function __construct(array $values)
    {
        $this->name = $values['name'] ?? "";
        $this->idUser = $values['idUser'] ?? "";
        $this->description = $values['description'] ?? "";
        $this->space = $values['space'] ?? "";
        $this->whenRegistered = $values['whenRegistered'] ?? "";
        $this->culture = $values['culture'] ?? "";
        $this->plantsPerField = $values['plantsPerField'] ?? "";
        $this->centralPointField = $values['centralPointField'] ?? "";
        $this->lastDayFertilized = $values['lastDayFertilized'] ?? "";
        $this->pointOne = $values['pointOne'] ?? "";
        $this->pointTwo = $values['pointTwo'] ?? "";
        $this->pointThree = $values['pointThree'] ?? "";
        $this->pointFour = $values['pointFour'] ?? "";
        $this->analysis = $values['analysis'] ?? [];
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

    public function getPointOne(): float
    {
        return $this->pointOne;
    }

    public function getPointTwo(): float
    {
        return $this->pointTwo;
    }
    public function getPointThree(): float
    {
        return $this->pointThree;
    }

    public function getPointFour(): float
    {
        return $this->pointFour;
    }
}
