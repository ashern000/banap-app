<?php

declare(strict_types=1);

namespace src\Infraestructure\Adapters;

use src\Application\Contracts\Bcrypt;

final class bcryptHashAdapter implements Bcrypt
{
    public function encrypt(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
