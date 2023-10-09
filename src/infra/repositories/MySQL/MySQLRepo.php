<?php

namespace src\infra\repositories\MySQL;

use Exception;
use src\Domain\Repositories\LoadUserRepositories\LoadUserRepository;
use src\Domain\valueObjects\Email;
use src\Domain\Entities\User;
use PDO;
use src\Domain\Repositories\LoadUserRepositories\CreateUserRepository;
use src\Domain\valueObjects\Password;

class MySQLRepo implements LoadUserRepository, CreateUserRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function loadByEmail(Email $email): User
    {
        $query = "SELECT * FROM users where email = :email";
        $result = $this->pdo->prepare($query);
        $result->execute([":email" => (string)$email]);
        $resultFetch = $result->fetch(PDO::FETCH_ASSOC);
        $user = new User();
        if ($result->rowCount() == 0) {
            throw new Exception("Usuário não encontrado!");
        }
        $user->setEmail(new Email($resultFetch['email']))->setName($resultFetch['nome'])->setProfilePic($resultFetch['profilePic'])->setPassword(new Password($resultFetch['password']));
        return $user;
    }

    public function create(User $user): User
    {
        $query = "INSERT INTO users(name, email, password,profilePic) VALUES(:name, :email, :password, :profilePic);";
        $result = $this->pdo->prepare($query);
        $result->execute([":email" => $user->getEmail(), ":name" => $user->getName(), ":password" => $user->getPassword(), ":profilePic" => $user->getProfilePic()]);
        $resultFetch = $result->fetch(PDO::FETCH_ASSOC);
        $user = new User();
        $user->setEmail(new Email($resultFetch['email']))->setName($resultFetch['nome'])->setProfilePic($resultFetch['profilePic'])->setPassword(new Password($resultFetch['password']));
        return $user;
    }
}
