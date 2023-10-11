<?php

declare(strict_types=1);

namespace src\Infraestructure\Adapters;

use Exception;
use src\Application\Contracts\SessionSave;
use src\Application\Contracts\SessionValidator;

final class SessionSaveAdapter implements SessionSave, SessionValidator
{
    public function saveSession(string $name, string $email)
    {
        return $_SESSION[$name] = $email;
    }

    public function sessionValidate(string $name, string $email): bool
    {
        if(!isset($_SESSION[$name])){
            throw new Exception("O usuário não está logado");
            return false;
        }

        return true;
    }
}
