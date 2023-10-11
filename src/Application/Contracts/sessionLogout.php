<?php

namespace src\Application\Contracts;

interface SessionLogout {
    public function logout(string $name): void;
}