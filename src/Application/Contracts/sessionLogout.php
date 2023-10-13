<?php

declare(strict_types=1);

namespace src\Application\Contracts;

interface SessionLogout {
    public function logout(): void;
}