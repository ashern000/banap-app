<?php

declare(strict_types=1);

namespace src\aplication\contracts;

interface SessionSave
{
    public function saveSession(string $name, string $email);
}
