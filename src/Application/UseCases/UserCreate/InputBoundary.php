<?php

declare(strict_types=1);

namespace src\Application\UseCases\UserCreate;

final class InputBoundary
{
    private string $email;
    private string $password;
    private string $profilePic;
    private string $name;

    public function __construct(string $email, string $password, string $name, string $profilePic)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->profilePic = $profilePic;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getProfilePic():string{
        return $this->profilePic;
    }
}
