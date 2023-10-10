<?php

declare(strict_types=1);

namespace src\Infra\Adapters;

use src\Application\Contracts\SessionSave;

final class SessionSaveAdapter implements SessionSave
{
    public function saveSession(string $name, string $email)
    {
        return $_SESSION[$name] = $email;
    }
}