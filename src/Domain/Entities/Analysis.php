<?php

declare(strict_types=1);

namespace src\Domain\Entities;

use DateTime;

final class Analysis
{
    private int $numberOfAnalysis;
    private int $organicMaterial;
    private int $carbonic;
    private int $phosphor;
    private int $calcium;
    private int $magnesium;
    private int $potassium;
    private int $zinc;
    private int $manganese;
    private int $iron;
    private int $copper;
    private int $blur;
    private int $sulfor;
    private float $quantityDirtInCollected;
    private DateTime $dataOfAnalysis;
}
