<?php

declare(strict_types=1);

namespace src\Application\Contracts;

use src\Domain\Entities\User;

interface EmailSender {
    public function sendEmailWelcome(User $user);
}