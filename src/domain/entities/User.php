<?php

declare(strict_types=1);

namespace src\domain\entities;

use Exception;
use src\domain\valueObjects\Email;
use src\domain\valueObjects\Password;

final class User
{

    private string $name;
    private Email $email;
    private Password $password;
    private string $profilePic;

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function setEmail(Email $email): User
    {
        $this->email = $email;
        return $this;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name): User
    {
        if (strlen($name) === 0) {
            return new Exception("O nome não pode ser vazio!");
        }
        if (strlen($name) < 3) {
            return new Exception("O nome tem que ter mais que três letras!");
        }
        $this->name = $name;
        return $this;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }

    public function setPassword(Password $password): User
    {
        $this->password = $password;
        return $this;
    }

    public function setProfilePic(string $profilePic): User
    {
        $this->profilePic = $profilePic;
        return $this;
    }

    public function getProfilePic(): string
    {
        return $this->profilePic;
    }
}
