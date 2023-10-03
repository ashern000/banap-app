<?php

namespace src\infra\adapters;
use src\aplication\contracts\SessionSave;

final class SessionSaveAdapter implements SessionSave{
    public function saveSession(string $name, string $email){
        $_SESSION[$name] = $email;
    }
}