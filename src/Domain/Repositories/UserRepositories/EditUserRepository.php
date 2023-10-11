<?php

declare(strict_types=1);

namespace src\Domain\Repositories\UserRepositories;

use src\Domain\Entities\User;

interface EditUserRepository
{
    public function editUser(User $user): User;
}
