<?php

declare(strict_types=1);

namespace src\Domain\Entities;


use DomainException;

final class Field
{
    private string $name;
    private int $idUser;
    private string $description;
    private float $space;
    private string $whenRegistered;
    private string $culture;
    private int $plantsPerField;
    private float $centralPointField;
    private string $lastDayFertilized;
    private float $pointOne, $pointTwo, $pointThree, $pointFour;
    private int $analysis;
    private int $id;

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
    public function getWhenRegistered(): string
    {
        return (string)$this->whenRegistered;
    }

    /**
     * Set the value of whenRegistered
     */
    public function setWhenRegistered(string $whenRegistered): Field
    {
        /*  if ($whenRegistered < new string('now')) {
            throw new DomainException("A data do campo não pode ser menor do que a data atual");
        } */
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
    public function getLastDayFertilized(): string
    {
        return $this->lastDayFertilized;
    }

    /**
     * Set the value of lastDayFertilized
     */
    public function setLastDayFertilized(string $lastDayFertilized): Field
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
    public function getAnalysis(): int
    {
        return $this->analysis;
    }

    /**
     * Set the value of analysis
     */
    public function setAnalysis(int $analysis): Field
    {
        $this->analysis = $analysis;

        return $this;
    }

    /**
     * Get the value of pointTwo
     */
    public function getPointTwo(): float
    {
        return $this->pointTwo;
    }

    /**
     * Set the value of pointTwo
     */
    public function setPointTwo(float $pointTwo): Field
    {
        if ($pointTwo == $this->getPointOne()) {
            throw new DomainException("Os pontos geográficos não podem ser iguais!");
        }

        $this->pointTwo = $pointTwo;

        return $this;
    }

    /**
     * Get the value of pointThree
     */
    public function getPointThree(): float
    {
        return $this->pointThree;
    }

    /**
     * Set the value of pointThree
     */
    public function setPointThree(float $pointThree): Field
    {
        if ($pointThree === $this->getPointOne() || $pointThree === $this->getPointTwo()) {
            throw new DomainException("Os pontos geográficos não podem ser iguais!");
        }

        $this->pointThree = $pointThree;

        return $this;
    }

    /**
     * Get the value of pointFour
     */
    public function getPointFour(): float
    {
        return $this->pointFour;
    }

    /**
     * Set the value of pointFour
     */
    public function setPointFour(float $pointFour): self
    {
        if ($pointFour === $this->getPointOne() || $pointFour === $this->getPointTwo() || $pointFour === $this->getPointThree()) {
            throw new DomainException("Os pontos geográficos não podem ser iguais!");
        }

        $this->pointFour = $pointFour;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
}
