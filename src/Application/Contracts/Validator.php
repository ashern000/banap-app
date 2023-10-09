<?php

declare(strict_types=1);

namespace src\Application\Contracts;

use src\Domain\valueObjects\Password;

interface Validator{
    public function validatorPassword(string $password,Password $passwordDatabase):bool;
}
