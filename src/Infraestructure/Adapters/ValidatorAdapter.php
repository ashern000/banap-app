<?php

declare(strict_types=1);

namespace src\Infraestructure\Adapters;

use Exception;
use src\Application\Contracts\Validator;
use src\Domain\valueObjects\Password;

final class ValidatorAdapter implements Validator
{
    public function validatorPassword(string $password, Password $passwordDatabase): bool
    {
        if (!password_verify($password, (string)$passwordDatabase)) {
            throw new Exception("As senhas não são iguais");
        }
        return true;
    }
}
