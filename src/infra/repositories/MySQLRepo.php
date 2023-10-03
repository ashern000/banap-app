<?php

namespace src\infra\repositories;

use PDO;
use src\domain\valueObjects\Email;
use src\domain\entities\User;
use src\domain\repositories\LoadUserRepository;

final class MySQLRepo implements LoadUserRepository{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function loadByEmail(Email $email): User
    {
        $query = "SELECT * FROM users where email = :email";
        $result =$this->pdo->prepare($query);
        $result->execute([":email"=>(string)$email]);
        $resultFetch = $result->fetch();
        $user = new User();

        $user->setEmail(new Email($resultFetch['email']));
        return $user;
    }
}
