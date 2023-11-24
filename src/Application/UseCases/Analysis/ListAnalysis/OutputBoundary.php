<?php

declare(strict_types=1);

namespace src\Application\UseCases\Analysis\ListAnalysis;

final class OutputBoundary
{
    private int $id;
    private int $idField;
    private float $necessidadeCalagem;
    private float $saturacaoBaseAtual;
    private float $CTC;
    private float $PRNT;
    private string $nameField;

    public function __construct(array $values)
    {
        $this->idField = $values['idField'];
        $this->id = $values['id'];
        $this->necessidadeCalagem = $values['necessidadeCalagem'];
        $this->saturacaoBaseAtual = $values['saturacaoBaseAtual'];
        $this->CTC = $values['CTC'];
        $this->PRNT = $values['PRNT'];
        $this->nameField = $values['nameField'];
    }

    /**
     * Get the value of idField
     *
     * @return int
     */
    public function getIdField(): int
    {
        return $this->idField;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of necessidadeCalagem
     *
     * @return float
     */
    public function getNecessidadeCalagem(): float
    {
        return $this->necessidadeCalagem;
    }

    /**
     * Get the value of saturacaoBaseAtual
     *
     * @return float
     */
    public function getSaturacaoBaseAtual(): float
    {
        return $this->saturacaoBaseAtual;
    }

    /**
     * Get the value of CTC
     *
     * @return float
     */
    public function getCTC(): float
    {
        return $this->CTC;
    }

    /**
     * Get the value of PRNT
     *
     * @return float
     */
    public function getPRNT(): float
    {
        return $this->PRNT;
    }

    /**
     * Get the value of nameField
     *
     * @return string
     */
    public function getNameField(): string
    {
        return $this->nameField;
    }
}
