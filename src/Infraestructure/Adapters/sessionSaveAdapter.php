<?php

declare(strict_types=1);

namespace src\Infraestructure\Adapters;

use Exception;
use src\Application\Contracts\SessionLogout;
use src\Application\Contracts\SessionSave;
use src\Application\Contracts\SessionUserLogged;
use src\Application\Contracts\SessionValidator;

final class SessionSaveAdapter implements SessionSave, SessionValidator, SessionLogout, SessionUserLogged
{
    public function saveSession(int $id)
    {
        return $_SESSION['session_user'] = $id;
    }

    public function sessionValidate(int $id): bool
    {
        if($_SESSION['session_user']!=$id){
            throw new Exception("O usuário não está logado");
            return false;
        }
        return true;
    }

    public function userLoggedIn(){
        return isset($_SESSION['session_user']);
    }

    public function logout(): void
    {
        unset($_SESSION['session_user']);
        session_destroy();  
    }
}
