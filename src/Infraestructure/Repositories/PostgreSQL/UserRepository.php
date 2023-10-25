<?php

declare(strict_types=1);

namespace Infraestructure\Repositories\PostgreSQL;

use PDO;
use src\Domain\Entities\User;
use src\Domain\Repositories\UserRepositories\CreateUserRepository;
use src\Domain\Repositories\UserRepositories\EditUserRepository;
use src\Domain\Repositories\UserRepositories\LoadUserRepository;
use src\Domain\valueObjects\Email;

final class UserRepositoryPostgreSQL implements CreateUserRepository, EditUserRepository, LoadUserRepository
{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(User $user): User
    {
        return $user;
    }

    public function editUser(User $user): User
    {
        return $user;
    }

    public function loadByEmail(Email $email): User
    {

        $user = new User();
        return $user;
    }
}
