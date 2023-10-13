<?php

declare(strict_types=1);

namespace src\Application\Contracts;

interface SessionValidator {
    public function sessionValidate(int $id):bool;
}