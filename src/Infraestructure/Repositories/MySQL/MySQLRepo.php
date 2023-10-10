<?php

namespace src\Infraestructure\repositories\MySQL;

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
        $userOutput = new User();
        if ($result->rowCount() == 0) {
            throw new Exception("Usuário não encontrado!");
        }
        $userOutput->setEmail(new Email($resultFetch['email']))->setName($resultFetch['nome'])->setProfilePic($resultFetch['profilePic'])->setPassword(new Password($resultFetch['password']));
        return $userOutput;
    }

    public function create(User $user): User
    {
        $query = "INSERT INTO users(nameUser, emailUser, passwordUser,profilePic)VALUES(:nameUser,:emailUser,:passwordUser,:profilePic);";
        $result = $this->pdo->prepare($query);
        $result->execute([":emailUser" =>$user->getEmail(), ":nameUser"=>$user->getName(), ":passwordUser"=>$user->getPassword(), ":profilePic"=>$user->getProfilePic()]);
        $userOutput = new User();
        $userOutput->setEmail(new Email($user->getEmail()))->setName($user->getName())->setProfilePic($user->getProfilePic())->setPassword(new Password($user->getPassword()));
        return $userOutput;
    }
}
