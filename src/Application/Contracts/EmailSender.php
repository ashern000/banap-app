<?php

declare(strict_types=1);

namespace src\Application\Contracts;

use src\Domain\valueObjects\Email;

interface EmailSender {
    public function sendEmailWelcome(Email $email);
}