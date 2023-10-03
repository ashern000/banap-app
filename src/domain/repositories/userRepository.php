<?php

declare(strict_types=1);
namespace src\domain\repositories;
use src\domain\entities\User;
use src\domain\valueObjects\Email;

interface LoadUserRepository{
    public function loadByEmail(Email $email): User;

}
