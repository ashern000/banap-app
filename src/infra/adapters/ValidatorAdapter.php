<?php

declare(strict_types=1);

namespace src\Infra\Adapters;

use Exception;
use src\Application\Contracts\PasswordValidator;
use src\Domain\valueObjects\Password;

final class ValidatorAdapter implements PasswordValidator
{
    public function validatorPassword(string $password, Password $passwordDatabase): bool
    {
        if (!password_verify($password, (string)$passwordDatabase)) {
            throw new Exception("As senhas não são iguais");
            return false;
        }

        return true;
    }
}
