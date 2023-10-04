<?php

namespace src\infra\repositories\MySQL;

use Exception;
use src\domain\repositories\LoadUserRepository;
use src\domain\valueObjects\Email;
use src\domain\entities\User;
use PDO;

class MySQLRepo implements LoadUserRepository
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
        $user->setEmail(new Email($resultFetch['email']))->setName($resultFetch['nome'])->setPhotoPerfil($resultFetch['photoPerfil']);
        return $user;
    }
}
