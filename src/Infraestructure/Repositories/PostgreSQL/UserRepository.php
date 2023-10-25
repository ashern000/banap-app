<?php

declare(strict_types=1);

namespace src\Infraestructure\Repositories\PostgreSQL;

use Exception;

use src\Domain\valueObjects\Email;
use src\Domain\Entities\User;
use PDO;
use src\Domain\Repositories\UserRepositories\CreateUserRepository;
use src\Domain\Repositories\UserRepositories\EditUserRepository;
use src\Domain\Repositories\UserRepositories\LoadUserRepository;
use src\Domain\valueObjects\Password;

final class UserRepositoryPostgreSQL implements LoadUserRepository, CreateUserRepository, EditUserRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function loadByEmail(Email $email): User
    {
        $query = "SELECT * FROM users where emailUser = :email";
        $result = $this->pdo->prepare($query);
        $result->execute([":email" => (string)$email]);
        $resultFetch = $result->fetch(PDO::FETCH_ASSOC);
        $userOutput = new User();
        if ($result->rowCount() == 0) {
            throw new Exception("Usuário não encontrado!");
        }
        $userOutput->setEmail(new Email($resultFetch['emailUser']))->setName($resultFetch['nameUser'])->setProfilePic($resultFetch['profilePic'])->setPassword(new Password($resultFetch['passwordUser']))->setId($resultFetch['id']);
        return $userOutput;
    }

    public function create(User $user): User
    {
        $query = "INSERT INTO users(nameUser, emailUser, passwordUser,profilePic)VALUES(:nameUser,:emailUser,:passwordUser,:profilePic);";
        $result = $this->pdo->prepare($query);
        $result->execute([":emailUser" => $user->getEmail(), ":nameUser" => $user->getName(), ":passwordUser" => $user->getPassword(), ":profilePic" => $user->getProfilePic()]);
        $userOutput = new User();
        $user->getEmail();
        $userOutput->setEmail(new Email((string)$user->getEmail()))->setName($user->getName())->setProfilePic($user->getProfilePic())->setPassword(new Password((string)$user->getPassword()));
        return $userOutput;
    }

    public function editUser(User $user): User
    {
        $query = "UPDATE users SET nameUser = :nameUser, emailUser = :emailUser, passwordUser = :passwordUser, profilePic = :profilePic where id = :id ";
        $result = $this->pdo->prepare($query);
        $result->execute([":emailUser" => $user->getEmail(), ":nameUser" => $user->getName(), ":passwordUser" => $user->getPassword(), ":profilePic" => $user->getProfilePic(), ":id" => $user->getId()]);
        $userOutput = new User();
        $userOutput->setEmail(new Email((string)$user->getEmail()))->setName($user->getName())->setProfilePic($user->getProfilePic())->setPassword(new Password((string)$user->getPassword()))->setId($user->getId());
        return $userOutput;
    }
}
