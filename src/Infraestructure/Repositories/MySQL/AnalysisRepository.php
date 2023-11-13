<?php

declare(strict_types=1);

namespace src\Infraestructure\Repositories\MySQL;

use PDO;
use src\Domain\Entities\Analysis;
use src\Domain\Repositories\AnalysisRepositories\RegisterLimingCalculation;

final class AnalysisRepository implements RegisterLimingCalculation
{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function registerLimingCalculation(Analysis $analysis): Analysis
    {

        $query = "INSERT INTO Analysis_Banap(id_talhao, necessidade_calagem, saturacao_base_desejada ,saturacao_base_atual, CTC, PRNT) VALUES (:id_talhao,:necessidade_calagem, :saturacao_base_desejada, :saturacao_base_atual, :CTC, :PRNT);";

        $prepared = $this->pdo->prepare($query);

        $prepared->bindValue(":id_talhao", $analysis->getIdField());
        $prepared->bindValue(":saturacao_base_desejada", $analysis->getDesiredBaseSaturation());
        $prepared->bindValue(":saturacao_base_atual", $analysis->getCurrentBaseSaturation());
        $prepared->bindValue(":necessidade_calagem", $analysis->getNeedForLiming());
        $prepared->bindValue(":CTC", $analysis->getTotalCationExchangeCapacity());
        $prepared->bindValue(":PRNT", $analysis->getRelativeTotalNeutralizingPower());
        $prepared->execute();

        return $analysis;
    }
}
