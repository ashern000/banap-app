<?php

declare(strict_types=1);

namespace src\Application\Contracts;

interface SessionSave
{
    public function saveSession(int $id);
}
