<?php

declare(strict_types=1);

namespace src\Domain\Repositories\UserRepositories;

use src\Domain\Entities\User;

interface CreateUserRepository
{
    public function create(User $user): User;
}
