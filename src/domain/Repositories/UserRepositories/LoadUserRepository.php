<?php

declare(strict_types=1);

namespace src\Domain\Repositories\UserRepositories;

use src\Domain\Entities\User;
use src\Domain\valueObjects\Email;

interface LoadUserRepository
{
    public function loadByEmail(Email $email): User;
}
