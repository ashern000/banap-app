<?php

declare(strict_types=1);

namespace src\Domain\Repositories\AnalysisRepositories;

use src\Domain\Entities\Analysis;

interface ListAnalysis {
    public function listAnalysis(Analysis $analysis):Analysis;
}