<?php

declare(strict_types=1);

namespace src\Domain\Repositories\LoadUserRepositories;

use src\Domain\Entities\User;

interface CreateUserRepository
{
    public function create(User $user): User;
}
