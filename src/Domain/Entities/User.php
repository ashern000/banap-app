<?php

declare(strict_types=1);

namespace src\Domain\Entities;

use Exception;
use src\Domain\valueObjects\Email;
use src\Domain\valueObjects\Password;

final class User
{
    private int $id;
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

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): User
    {
        $this->id = $id;

        return $this;
    }
}
