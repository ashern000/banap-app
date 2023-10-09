<?php

declare(strict_types=1);

namespace src\Infra\Adapters;

use src\Application\Contracts\Bcrypt;

final class BcryptHashAdapter implements Bcrypt
{
    public function encrypt(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
